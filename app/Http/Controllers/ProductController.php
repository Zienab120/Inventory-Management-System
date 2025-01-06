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
        $products = Product::all();
        return view('Admin.all_product',compact('products'));    }

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
        $product_code = $request->code;
        $product_name = $request->name;
        $product_category = $request->category;
    	$product_stock = $request->stock;
    	$product_unit_price = $request->unit_price;
        $product_sales_unit_price = $request->sale_price;
    	// $product_total_price = $request->stock * $request->unit_price;
        // $product_sales_stock_price =$request->stock * $request->sale_price;
        Product::create([
                         'product_code' => $product_code,
                         'name' => $product_name,
                         'category' => $product_category,
                         'stock' => $product_stock,
                         'unit_price' => $product_unit_price,
                         'sales_unit_price' => $product_sales_unit_price]);

        return Redirect()->route('add.customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('Admin.add_order',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('Admin.edit_product', compact('product'));
        // dd($product->name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product_code = $request->code;
        $product_name = $request->name;
        $product_category = $request->category;
    	$product_stock = $request->stock;
    	$product_unit_price = $request->unit_price;
        $product_sales_unit_price = $request->sale_price;
    	// $product_total_price = $request->stock * $request->unit_price;
        // $product_sales_stock_price =$request->stock * $request->sale_price;
        $product = Product::find($id);
        $product->update([
                         'product_code' => $product_code,
                         'name' => $product_name,
                         'category' => $product_category,
                         'stock' => $product_stock,
                         'unit_price' => $product_unit_price,
                         'sales_unit_price' => $product_sales_unit_price]);

        // return view('Admin.all_product');
        return redirect()->route('all.product');
        // return Redirect()->view('Admin.all_product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect()->route('all.product');
    }

    public function availableProducts()
    {
        // $products = Product::select('product_name')->where('stock','>',0);
        $products = Product::where('stock','>','0')->get();
        return view('Admin.available_products',compact('products'));
    }
    
}
