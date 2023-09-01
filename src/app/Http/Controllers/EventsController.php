<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Zones;
use App\Services\EventsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
        $eventsService = new EventsService();
        $events = $eventsService->index();
        $authenticatedUser = Auth::user();

        return view('events.events', ['events' => $events, 'authenticatedUser' => $authenticatedUser]);
    }

    public function myEvents()
    {
        $eventsService = new EventsService();
        $events = $eventsService->myEvents(Auth::user()->id);
        return view('events.myEvents', ['events' => $events]);
    }

    public function create()
    {
        $categories = Categories::all();
        return view('events.acreate', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $eventsService = new EventsService();
        $eventsService->store($request);
        return redirect('index_zones');
    }

    public function edit($id)
    {   
        $eventsService = new EventsService();
        $event = $eventsService->edit($id);

        return view('events.edit', [
                    'categories' => $event['categories'],
                    'event' => $event['event']
        ]); 
    }

    public function update(Request $request)
    {
        $eventsService = new EventsService();
        $eventsService->update($request);
        return redirect('index_events');
    }

    public function destroy($id)
    {
        $eventsService = new EventsService();
        $eventsService->destroy($id);
        return redirect('index_events');
    }
}
