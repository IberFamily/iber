@extends('layouts.seller')


@section('content')

    <h4>Orders</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Order number</th>
                <th>Status</th>
                <th>Item count</th>
                <th>Shipping Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td scope="row">
                        {{$order->order->order_number}}
                    </td>
                    <td>
                        {{$order->status}}

                        @if($order->status != 'completed')

                            <a href=" {{route('seller.order.delivered', $order)}} " class="btn btn-primary btn-sm">mark as delivered</button>
                        @endif
                    </td>

                    <td>
                        {{$order->item_count}}
                    </td>

                    <td>
                       {!! $order->order->shipping_address !!}
                    </td>

                    <td>
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{route('seller.orders.show', $order)}}" role="button">View</a>
                    </td>
                </tr>
            @empty

            @endforelse


        </tbody>
    </table>


@endsection

