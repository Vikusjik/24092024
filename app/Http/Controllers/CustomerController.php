<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
        // return Customer::select('first_name', 'last_name', 'points')->get();
    public function index()
    {

        $results = DB::table('customers as c')
            ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
            ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
            ->select(
                'c.customer_id',
                'c.first_name',
                'c.last_name',
                'c.address',
                'c.city',
                'c.state',
                'c.points',
                'o.order_date',
                'os.name as order_status_name'
            )
            ->get();

            return $results;
    //     $customers = DB::select('SELECT 
    //     c.customer_id,
    //     c.first_name,
    //     c.last_name,
    //     c.address,
    //     c.city,
    //     c.state,
    //     c.points,
    //     o.order_date,
    //     os.name
    //     FROM 
    //     sql_store.customers c
    //     JOIN 
    //     sql_store.orders o
    //     JOIN
    //     sql_store.order_statuses os
    //     ON 
    //     c.customer_id = o.customer_id'
    //    );
     
    // return $customers;
    // \Log::debug($customers);
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

        $results = DB::table('customers as c')
        ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
        ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
        ->select(
            'c.customer_id',
            'c.first_name',
            'c.last_name',
            'c.address',
            'c.city',
            'c.state',
            'c.points',
            'o.order_date',
            'os.name as order_status_name'
        )
        ->where('c.customer_id', '=', [$customer->customer_id]
        )
        ->toSql();

        return $results;


    //     $customers = DB::select('SELECT 
    //     c.customer_id,
    //     c.first_name,
    //     c.last_name,
    //     c.address,
    //     c.city,
    //     c.state,
    //     c.points,
    //     o.order_date,
    //     os.name
    //     FROM 
    //     sql_store.customers c
    //     JOIN 
    //     sql_store.orders o
    //     JOIN
    //     sql_store.order_statuses os
    //     ON 
    //     c.customer_id = o.customer_id
    //     WHERE 
    //     c.customer_id=?' , [$customer]
    //    );
    //    return $customers;
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
