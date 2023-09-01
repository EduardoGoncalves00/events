<?php

namespace App\Http\Controllers;

use App\Services\TicketsService;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketsService = new TicketsService();
        $tickets = $ticketsService->index();
        return $tickets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticketsService = new TicketsService($request);
        $ticketsService->store($request);
        return response()->json(['success' => true]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ticketsService = new TicketsService($request);
        $ticketsService->update($request);
        return response()->json(['success' => true]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketsService = new TicketsService($id);
        $ticketsService->destroy($id);
        return response()->json(['success' => true]); 
    }
}
