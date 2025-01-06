<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('Admin.all_invoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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

    public function soldProducts()
    {
        $products = Invoice::select('product_name', Invoice::raw("SUM(quantity) as count"))
        ->groupBy(Invoice::raw("product_name"))->get();
        return view('Admin.sold_products',compact('products'));
    }

    public function newformData()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('Admin.new_invoice',compact('products','customers'));
    }
}
