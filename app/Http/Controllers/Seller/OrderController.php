<?php

namespace App\Http\Controllers\Seller;

use App\Models\Product;
use App\Models\Order;
use App\Models\SubOrder;
use App\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::where('seller_id', auth()->id())->get();

        return view('sellers.orders.index', compact('orders'));

    }

    public function show(Order $order)
    {
        $items = $order->items;

        return view('sellers.orders.show', compact('items'));
    }

    public function markDelivered(Order $suborder)
    {
        $suborder->status = 'completed';
        $suborder->save();

        //check if all suborders complete
        $pendingSubOrders = $suborder->order->subOrders()->where('status','!=', 'completed')->count();

        if($pendingSubOrders == 0) {
            $suborder->order()->update(['status'=>'completed']);
        }

        return redirect('/seller/orders')->withMessage('Order marked complete');
    }
}
