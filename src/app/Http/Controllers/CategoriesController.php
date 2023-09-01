<?php

namespace App\Http\Controllers;

use App\Services\CategoriesService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categoriesService = new CategoriesService();
        $categories = $categoriesService->index();
        return view('categories.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {   
        $categoriesService = new CategoriesService();
        $categoriesService->store($request);
        return redirect('index_categories');
    }

    public function edit($id)
    {   
        $categoriesService = new CategoriesService();
        $category = $categoriesService->edit($id);
        return view('categories.edit', ['category'=> $category]);
    }

    public function update(Request $request)
    {
        $categoriesService = new CategoriesService();
        $categoriesService->update($request);
        return redirect('index_categories');
    }

    public function destroy($id)
    {
        $categoriesService = new CategoriesService();
        $categoriesService->destroy($id);
        return redirect('index_categories');
    }
}
