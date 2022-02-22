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


    public function update(Request $request, $id)
    {


        // $request->validate([
        //     'email'=>'unique:customers,email',//'required|unique:customers'
        //     'phone'=>'unique:customers,phone',
        // ]);

        // Customer::whereId($id)->update($request->all());
        //     return redirect()->route('customer.index');


            ///
            $todo=Customer::find($id);
        $todo->name=$request->name;
        $todo->email=$request->email;
        $todo->phone=$request->phone;
        $todo->Address=$request->Address;
        $todo->save();
        return redirect(route('customer.index'));



            // $validatedData = $request->validate([
            //     'name' => 'required|max:255',
            //     'price' => 'required'
            // ]);
            // Game::whereId($id)->update($validatedData);

    }

    public function destroy($id)
    {
        Customer::destroy($id);
        // return redirect()->route('customer.index');
       return redirect()->route('customer.index')->with('success','customer deleted successfully');

    }
}
