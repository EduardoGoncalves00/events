<?php

namespace App\Services;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesService {

    public function index()
    {
        return Categories::all();
    }

    public function store(Request $request)
    {
        $categories = new Categories;
        $categories->name = $request->input('name');
        $categories->save();
    }

    public function edit($id)
    {
        return Categories::findOrFail($id);
    }

    public function update(Request $request)
    {
        Categories::findOrFail($request->id)->update($request->all());
    }

    public function destroy($id)
    {
        return Categories::findOrFail($id)->delete();
    }
}