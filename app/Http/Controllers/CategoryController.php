<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            "category_name"=>$request->get('category_name'),
        ]);
        return Category::all()->last();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Category::all()->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,$id)
    {
        $category=Category::all()->find($id);
        $category->update([
            "category_name"=>$request->get('category_name')
        ]);
        return Category::all()->last();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category=Category::all()->find($id);
        return $category->delete();
    }
}
