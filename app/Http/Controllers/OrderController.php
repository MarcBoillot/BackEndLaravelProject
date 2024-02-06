<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create([
            "delivery_address"=>$request->get('delivery_address'),
            "facturation_address"=>$request->get('facturation_address'),
            "user_id"=>$request->get('user_id'),
            "order_status"=>$request->get('order_status'),
            "order_price"=>$request->get('order_price'),
            "order_date"=>$request->get('order_date'),
        ]);
        return Order::all()->last();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Order::all()->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order, $id)
    {
        $order=Order::all()->find($id);
        $order->update([
            "delivery_address"=>$request->get('delivery_address'),
            "facturation_address"=>$request->get('facturation_address'),
            "order_status"=>$request->get('order_status'),
            "order_price"=>$request->get('order_price'),
            "order_date"=>$request->get('order_date'),
        ]);
        return Order::all()->last();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order=Order::all()->find($id);
        return $order->delete($order);
    }
}
