<?php

namespace App\Services;

use App\Models\Events;
use App\Models\shopping_cart;
use App\Models\Tickets;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsService {

    protected $zones;
    protected $shopping_cart;

    public function __construct(Zones $zones, Shopping_cart $shopping_cart) 
    {
        $this->zones = $zones;
        $this->shopping_cart = $shopping_cart;
    }

    public function index()
    {
        return Tickets::all();       
    }

    public function buyTicket($eventId)
    {
        $event = Events::find($eventId);
        $zonesEvent = Zones::where('event', $eventId)->get();

        return [
            'event' => $event,
            'zonesEvent' => $zonesEvent,
        ];
    }

    public function storeTicket()
    {
        $tickets = $this->shopping_cart::all(); 

        foreach ($tickets as $ticket) {
            if ($ticket->quantity > 1) {
                $zone = Zones::findOrFail($ticket->zone);
                $zone->addTicketsBought($ticket);
                $id = Auth::user()->id;

                for ($i = 0; $i < $ticket->quantity; $i++) {
                    $newTicket = new Tickets();
                    $newTicket->user_id = $id;
                    $newTicket->half_price = $ticket->half_price;
                    $newTicket->event_id = $ticket->event_id;
                    $newTicket->zone_id = $ticket->zone;
                    $newTicket->save();
                }
            } else {
                $zone = Zones::findOrFail($ticket->zone);
                $zone->addTicketsBought($ticket);
                $id = Auth::user()->id;

                $newTicket = new Tickets();
                $newTicket->user_id = $id;
                $newTicket->half_price = $ticket->half_price;
                $newTicket->event_id = $ticket->event_id;
                $newTicket->zone_id = $ticket->zone;
                $newTicket->save();
            }
        }
        
        $this->shopping_cart::truncate();
    }
}