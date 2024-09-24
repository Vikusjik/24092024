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
        return Customer::select('first_name', 'last_name', 'points')->get();
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
        $fields = $request->validate([
            'customer_id',
            'first_name',
            'last_name',
            'address',
            'city',
            'state'
        ]);
        // $request->validate([
        // 'customer_id' => 'required',
        // 'first_name',
        // 'last_name',
        // 'gold_member',
        // 'address',
        // 'city',
        // 'state',
        // 'points'
        // ]);
        $customer = Customer::create($fields);
        return [ 'customer' => $customer];

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return [
            'customer_id' => $customer->customer_id,
            'first_name' => $customer->first_name,
            'last_name' => $customer->last_name,
            'gold_member' => $customer->isGoldMember,
            'address' => $customer->adress,
            'city' => $customer->city,
            'state' => $customer->state,
            'points' => $customer->points
        ];
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
