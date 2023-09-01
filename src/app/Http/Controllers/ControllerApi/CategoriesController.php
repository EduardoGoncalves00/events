<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesService = new CategoriesService();
        $categories = $categoriesService->index();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function created(Request $request)
    {
        $categoriesService = new CategoriesService($request);
        $categoriesService->created($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categoriesService = new CategoriesService();
        $categoriesService->update($request);
        return response()->json(['success' => true]);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoriesService = new CategoriesService($id);
        $categoriesService->destroy(($id));
        return response()->json(['success' => true]);   
    }
}
