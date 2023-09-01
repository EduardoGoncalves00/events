<?php

namespace App\Http\Controllers;

use App\Services\ZonesService;
use Illuminate\Http\Request;

class ZonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonesService = new ZonesService();
        $zones = $zonesService->index();
        return $zones;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $zonesService = new ZonesService($request);
        $zonesService->create($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $zonesService = new ZonesService();
        $zonesService->update($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zones  $zones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonesService = new ZonesService();
        $zonesService->destroy($id);
        return response()->json(['success' => true]);  
    }
}
