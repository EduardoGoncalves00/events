<?php

namespace App\Services;

use App\Models\Events;
use App\Models\Zones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZonesService {

    public function index()
    {
        $zones = (new Zones)->getZonesByAuthenticatedUserEvents();
        
        $events = Events::where('creator', Auth::user()->id)->get();

        return [
            'zones' => $zones,
            'events' => $events,
        ];
    }

    public function store($request)
    {
        $zones = new Zones();
        $zones->name = $request->input('name');
        $zones->value = $request->input('value');
        $zones->event = $request->input('event');
        $zones->capacity = $request->input('capacity');
        $zones->bought = $request->input('bought');
        $zones->save();
    }

    public function edit($id)
    {
        return Zones::findOrFail($id);
    }

    public function update(Request $request)
    {
        Zones::findOrFail($request->id)->update($request->all());
    }

    public function destroy($id)
    {
        Zones::findOrFail($id)->delete();
    }
}