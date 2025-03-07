<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // Customer View
    public function customer($id, $name, $address)
    {
        return view('customer', compact('id', 'name', 'address'));
    }

    // Item View
    public function item($item_no, $name, $price)
    {
        return view('item', compact('item_no', 'name', 'price'));
    }

    // Order View
    public function order($customer_id, $name, $order_no, $date)
    {
        return view('order', compact('customer_id', 'name', 'order_no', 'date'));
    }

    // Order Details View
    public function orderDetails($trans_no, $order_no, $item_id, $name, $price, $qty)
    {
        return view('orderdetails', compact('trans_no', 'order_no', 'item_id', 'name', 'price', 'qty'));
    }
}
