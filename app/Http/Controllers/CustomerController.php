<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Show the form for creating a new customer.
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer in the database.
    public function store(Request $request)
    {
        // Validate the form data
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'contact_number' => [
                'required',
                'regex:/^(?:\+63|0)[0-9]{10}$/',
                'unique:customers,contact_number',
            ],
            'email' => 'required|email|unique:customers,email',
            'address' => 'required|string|max:500',
            'status' => 'required|in:0,1', // Validate active field
        ]);

        // Create a new customer record

        
        Customer::create($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer added successfully.');
    }

    // Show the form for editing the specified customer.
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Update the specified customer in the database.
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'contact_number' => [
                'required',
                'regex:/^(?:\+63|0)[0-9]{10}$/',
                'unique:customers,contact_number,' . $customer->id,
            ],
            'address' => 'required',
            'email' => 'required|unique:customers,email,' . $customer->id,
            'status' => 'required',
        ]);

        $customer->update($validatedData);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    // Remove the specified customer from the database.
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}