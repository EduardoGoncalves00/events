<?php

namespace App\Http\Controllers;

use App\Services\TicketsService;

class TicketsController extends Controller
{
    protected $ticketsService;

    public function __construct(TicketsService $ticketsService)
    {
        $this->ticketsService = $ticketsService;
    }

    public function index()
    {
        $tickets = $this->ticketsService->index();

        return view('tickets.tickets', ['tickets' => $tickets]);
    }

    public function buyTicket($eventId)
    {
        $ticket = $this->ticketsService->buyTicket($eventId);

        return view('tickets.buyTicket', [
            'event' => $ticket['event'],
            'zonesEvent' => $ticket['zonesEvent']
        ]);
    }

    public function storeTicket()
    {
        $this->ticketsService->storeTicket();

        return redirect('index_tickets');
    }
}
