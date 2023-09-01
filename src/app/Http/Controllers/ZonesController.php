<?php

namespace App\Http\Controllers;

use App\Services\ZonesService;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    public function index()
    {
        $zonesService = new ZonesService();
        $zones = $zonesService->index();

        return view('zones.zones', [
            'zones' => $zones['zones'],
            'events' => $zones['events']
        ]);
    }

    public function store(Request $request)
    {   
        $zonesService = new ZonesService();
        $zonesService->store($request);
        return redirect('index_zones');
    }

    public function edit($id)
    {
        $zonesService = new ZonesService();
        $zone = $zonesService->edit($id);
        return view('zones.edit', ['zone' => $zone]);
    }

    public function update(Request $request)
    {
        $zonesService = new ZonesService();
        $zonesService->update($request);
        return redirect('index_zones');
    }

    public function destroy($id)
    {
        $zonesService = new ZonesService();
        $zonesService->destroy($id);
        return redirect('index_zones');
    }
}
