<?php

namespace App\Http\Controllers;

use App\Models\shopping_cart;
use App\Services\ShoppingCartService;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $shoppingCartService;

    public function __construct(ShoppingCartService $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function index()
    {
        $ticketsData = $this->shoppingCartService->index();

        return view('shoppingCart.shoppingCart', $ticketsData);
    }

    public function addCart(Request $request, $eventId)
    {
        $this->shoppingCartService->addCart($request, $eventId);

        return redirect('index_events');
    }

    public function payment()
    {
        return view('shoppingCart.payment');
    }

    public function actionPayment(Request $request)
    {
        $this->shoppingCartService->actionPayment($request);

        return redirect('index_tickets');
    }
}
