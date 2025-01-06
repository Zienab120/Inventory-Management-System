<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('Admin.all_customers',['customers'=> $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers',
            'company' => 'required',
            'address'=> 'required|min:10',
            'phone' => 'required|min:11'
            ]);
        $name = $request->name;
        $email = $request->email;
        $company = $request->company;
        $address = $request->address;
        $phone = $request->phone;

        Customer::create(
        ['name' =>$name,
                     'email' => $email,
                     'company' => $company,
                     'address' => $address,
                     'phone' => $phone]);

        return Redirect()->route('add.customer');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('show',['customer' => $customer]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('edit',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer =  Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->gender = $request->gender;
        // if($request->is_active){
        //     $customer->is_active = 1;
        // }
      
        // $customer->date_of_birth = $request->date_of_birth;
        // $customer->roll = $request->roll;

        if($customer->save())
        {
           
            return redirect()->back()->with(key: ['msg' => 'The Customer Data is Updated Successfully']);
        }
        else
        {
            return redirect()->back()->with(['msg' => 'There is an Error occurred']);
        }
     
        // return view('customer.edit',compact('customers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer =  Customer::find($id);
        if($customer->delete())
        {
           
            return redirect()->back()->with(['msg' => 'The Customer Data is Deleted']);
        }
        else
        {
            return redirect()->back()->with(['msg' => 'The Data is not Deleted']);
        }
    }
}
