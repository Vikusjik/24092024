<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Customer $customer){
        $results = DB::table('orders as o')
            ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
            ->join('customers as c', 'c.customer_id', '=', 'o.customer_id')
            ->select(
                'o.order_id',
                'o.order_date',
                'os.name as order_status_name'
            )
            ->where('c.customer_id', $customer->customer_id)
            ->get();

            return $results;
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
    public function show(Customer $customer, Order $order){
        $result = DB::table('orders as o')
            ->join('order_statuses as os', 'o.status', '=', 'os.order_status_id')
            ->join('customers as c', 'c.customer_id', '=', 'o.customer_id')
            ->select(
                'o.order_id',
                'o.order_date',
                'os.name as order_status_name'
            )
            ->where('c.customer_id', $customer->customer_id)
            ->where('o.order_id', $order->order_id )
            ->get();

            return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
