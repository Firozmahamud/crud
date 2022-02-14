<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customer= Customer::all();
        return view('customer.index',compact('customer'));
    }


    public function create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'unique:customers,email',//'required|unique:customers'
            'phone'=>'unique:customers,phone',

        ]);

        // Customer::create($request->all());
        Customer::create($request->all());
        // return view('customer.index');
        return redirect()->route('customer.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $all= Customer::find($id);
        return view('customer.edit',compact('all'));
    }


    // public function update(Request $request, $id)
    // {


    //     $request->validate([
    //         'email'=>'unique:customers,email',//'required|unique:customers'
    //         'phone'=>'unique:customers,phone',
    //     ]);

    //     Customer::find($id)->update($request->all());
    //         // $this->RespondWithSuccess('customer update successful');
    //         return redirect()->route('customer.index');

    // }
    public function update(Request $request, Customer $product)
    {
        $request->validate([
            'email'=>'unique:customers,email',//'required|unique:customers'
            'phone'=>'unique:customers,phone',
        ]);

        $product->update($request->all());

        return redirect()->route('customer.index')
                        ->with('success','Product updated successfully');
    }


    public function destroy($id)
    {
        Customer::destroy($id);
        // return redirect()->route('customer.index');
       return redirect()->route('customer.index')->with('success','customer deleted successfully');

    }
}
