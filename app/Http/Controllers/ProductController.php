<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            "unit_price"=>$request->get('unit_price'),
            "name"=>$request->get('name'),
            "description"=>$request->get('description'),
            "status"=>$request->get('status'),
            "color"=>$request->get('color'),
            "customizable"=>$request->get('customizable'),
            "is_active"=>$request->get('is_active'),
        ]);
        return Product::all()->last();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Product::all()->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {
        $product=Product::all()->find($id);
        $product->update([
            "unit_price"=>$request->get('unit_price'),
            "name"=>$request->get('name'),
            "description"=>$request->get('description'),
            "status"=>$request->get('status'),
            "color"=>$request->get('color'),
            "customizable"=>$request->get('customizable'),
            "is_active"=>$request->get('is_active'),
        ]);
        return Product::all()->last();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product=Product::all()->find($id);
        return $product->delete($product);
    }
}
