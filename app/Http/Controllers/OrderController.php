<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'deliver_fullname' =>'required',
            'delivery_state' =>'required',
            'delivery_city' =>'required',
            'delivery_address' =>'required',
            'delivery_phone' =>'required',
            'delivery_zipcode' =>'required',
        ]);
        $order = new Order();

        $order->order_number = uniqid('order_number- ');

        $order->delivery_fullname = $request->input('deliver_fullname');
        $order->delivery_state = $request->input('delivery_state');
        $order->delivery_city = $request->input('delivery_city');
        $order->delivery_address = $request->input('delivery_address');
        $order->delivery_phone = $request->input('delivery_phone');
        $order->delivery_zipcode = $request->input('delivery_zipcode');

        if($request->has('deliver_fullname')){
            $order->billing_fullname = $request->input('deliver_fullname');
            $order->billing_state = $request->input('delivery_state');
            $order->billing_city = $request->input('delivery_city');
            $order->billing_address = $request->input('delivery_address');
            $order->billing_phone = $request->input('delivery_phone');
            $order->billing_zipcode = $request->input('delivery_zipcode');
        }else{
            $order->billing_fullname = $request->input('billing_fullname');
            $order->billing_state = $request->input('billing_state');
            $order->billing_city = $request->input('billing_city');
            $order->billing_address = $request->input('billing_address');
            $order->billing_phone = $request->input('billing_phone');
            $order->billing_zipcode = $request->input('billing_zipcode');
        }



        $order->grand_total = \Cart::session(auth()->id())->getTotal();
        $order->item_count = \Cart::session(auth()->id())->getContent()->count();

        $order->user_id = auth()->id();

        $order->save();

        //save order items bre bratice

        $cartItems  =  \Cart::session(auth()->id())->getContent();

        foreach($cartItems as $item){
            $order->items()->attach($item->id,['price' => $item->price, 'quantity' => $item->quantity]);

        }

        \Cart::session(auth()->id())->Clear();

        return  view('success');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
