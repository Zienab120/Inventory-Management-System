<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('Admin.all_orders',compact('orders'));
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
        $email = $request->email;
        $product_code = $request->code;
        $product_name = $request->name;
        $quantity = $request->quantity;
    	$order_status = 0;
        Order::create([
            'email' => $email,
            'product_code' => $product_code,
            'product_name' => $product_name,
            'quantity' => $quantity,
            'order_status' => $order_status
        ]);

        return Redirect()->route('all.orders');
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

    public function pendingOrders()
    {
        // $orders = Order::where('order_status','=',0);
        $orders = Order::where('order_status','=','0')->get();
        // dd($orders);
        return view('Admin.pending_orders', compact('orders'));

    }

    public function newformData()
    {
        $products = Product::all();
        $customers = Customer::get();
        return view('Admin.new_order',compact('products','customers'));
    }

    public function deliveredOrders()
    {
        // $orders = Order::where('order_status','=',0);
        $orders = Order::where('order_status','!=','0')->get();
        return view('Admin.delivered_orders', compact('orders'));
    }
}
