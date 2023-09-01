<?php

namespace App\Services;

use App\Http\Controllers\StripePaymentController;
use App\Models\Events;
use App\Models\shopping_cart;
use App\Models\Tickets;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartService {

    protected $zones;
    protected $tickets;
    protected $shoppingCart;
    protected $events;
    protected $stripePaymentController;
    protected $ticketsService;

    public function __construct(Zones $zones, Shopping_cart $shoppingCart, Events $events, StripePaymentController $stripePaymentController, TicketsService $ticketsService) 
    {
        $this->zones = $zones;
        $this->shoppingCart = $shoppingCart;
        $this->events = $events;
        $this->stripePaymentController = $stripePaymentController;
        $this->ticketsService = $ticketsService;
    }

    public function index()
    {
        $user = Auth::user();
        $shoppingCart = $this->shoppingCart->where('user_id', $user->id)->get();
        $tickets = [];
        $totalValueTickets = [];

        foreach ($shoppingCart as $cart) {
            $zone = $this->zones->find($cart->zone);
            $remainingCapacity = $zone->capacity - $zone->bought;

            $totalAmountEachTicket = $cart->value;
            $halfPrice = $cart->half_price;
            $quantity = $cart->quantity;
            $zone = $cart->zone;
            $event = $this->events->findOrFail($cart->event_id);

            $ticket = [
                'cart' => $cart,
                'totalAmountEachTicket' => $totalAmountEachTicket,
                'halfPrice' => $halfPrice,
                'quantity' => $quantity,
                'zone' => $zone,
                'event' => $event,
                'remainingCapacity' => $remainingCapacity
            ];

            $tickets[] = $ticket;
            $totalValueTickets[] = $cart->value * $cart->quantity;
        }

        return [
            'tickets' => $tickets,
            'totalValueTickets' => array_sum($totalValueTickets)
        ];
    }

    public function addCart(Request $request, $eventId)
    {
        $shoppingCart = $this->shoppingCart
            ->where('user_id', Auth::user()->id)
            ->where('event_id', $eventId)
            ->where('zone', $request->zone_id)
            ->where('half_price', $request->has('half_price'))
            ->first();

        $ticketValue = $this->zones->findOrFail($request->zone_id)->ticketValue($request->zone_id);

        if ($shoppingCart == null) {
            $shoppingCart = new shopping_cart();
            $shoppingCart->user_id = Auth::user()->id;
            $shoppingCart->zone = $request->zone_id;
            $shoppingCart->event_id = $eventId;

            $halfPrice = $request->input('half_price', false);
            $shoppingCart->half_price = $halfPrice ? 1 : 0;

            $shoppingCart->quantity = $request->input('quantity', 1);
            $shoppingCart->value = $halfPrice ? $ticketValue['ticketValue'] / 2 : $ticketValue['ticketValue'];
            $shoppingCart->save();
        }
    }

    public function actionPayment(Request $request)
    {
        $stripePost = $this->stripePaymentController->stripePost($request);
        $array = $stripePost->original;

        if ($array[0] === "succeeded") {
            return $this->ticketsService->storeTicket();
        } else {
            return 'Algo deu errado!'; //colocar log
        }
    }

    public function update(Request $request)
    {
        Tickets::findOrFail($request->id)->update($request->all());
    }
}
