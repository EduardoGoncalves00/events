<?php

namespace App\Services;

use App\Models\Categories;
use App\Models\Events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsService {

    public function index()
    {
        $currentDate = Carbon::now();
        
        return Events::where('end', '>=', $currentDate)->get();        
    }

    public function myEvents($userId)
    {   
        return Events::where('creator', $userId)->get();
    }
    
    public function store(Request $request)
    {
        $events = new Events;
        $events->name = $request->input('name');
        $events->description = $request->input('description');
        $events->start = $request->input('start');
        $events->end = $request->input('end');
        $events->creator = Auth::user()->id;
        $events->city = $request->input('city');
        $events->state = $request->input('state');
        $events->category_id = $request->input('category_id');
        $events->save();
    }

    public function edit($id)
    {
        $categories = Categories::all();
        $event = Events::findOrFail($id);

        return [
            'categories' => $categories,
            'event' => $event,
        ];
    }

    public function update(Request $request)
    {
        Events::findOrFail($request->id)->update($request->all());
    }

    public function destroy($id)
    {
        Events::findOrFail($id)->delete();
    }
}