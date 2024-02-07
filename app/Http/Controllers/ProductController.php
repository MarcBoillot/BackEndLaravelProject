<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store(StoreProductRequest $request)
    {
        $product = new Product($request->validated());
        $product->save();
//        Product::create([
//            "unit_price"=>$request->get('unit_price'),
//            "name"=>$request->get('name'),
//            "description"=>$request->get('description'),
//            "status"=>$request->get('status'),
//            "color"=>$request->get('color'),
//            "customizable"=>$request->get('customizable'),
//            "is_active"=>$request->get('is_active'),
//            "user_id"=>$request->get('user_id')
//        ]);
        return response()->json(['product' => $product], 201);
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
        $product->categories()->detach();

        return $product->delete($product);
    }
    public function productsByCategory($categoryId){
//        $products=Product::where('id','9b4389fb-d387-4c4d-979c-e3c062dad9d0')->first()->categories;
//        dd($request->all());
        $products = Product::whereHas('categories', function (Builder $query ) use ($categoryId) {
            $query->where('category_id',$categoryId);
        })->get();
        return $products;
    }
}
