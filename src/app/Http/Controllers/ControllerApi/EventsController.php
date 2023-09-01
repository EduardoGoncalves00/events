<?php

namespace App\Http\Controllers;

use App\Services\EventsService;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventsService = new EventsService;
        $events = $eventsService->index();
        return $events;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created(Request $request)
    {
        $eventsService = new EventsService;
        $eventsService->created($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoriesService = new EventsService();
        $categoriesService->update($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriesService = new EventsService();
        $categoriesService->destroy($id);
        return response()->json(['success' => true]);   
    }
}
