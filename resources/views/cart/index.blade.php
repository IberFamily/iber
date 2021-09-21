@extends('layouts.app')

@section('content')
<div class="container " style="height:90vh;">
    <h2 class="py-5">Yout Cart</h2>


    <div class="row-flex d-flex ">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
            @foreach ($cartItems as $item)
                        <tbody>
                            <tr>
                                <td scope="row">{{ $item->name }}</td>
                                <td>  {{ \Cart::session(auth()->id())->get($item->id)->getPriceSum() }}<small>Rsd.</small></td>

                                <td>
                                        <form action="{{ route('cart.update',$item->id) }}">
                                            <input name="quantity" type="number" value="{{ $item->quantity }}"> <small>Kom.</small>
                                            <input type="submit" value="save" class="btn btn-secondary">
                                        </form>
                                </td>
                                <td>
                                    <a href="{{ route('cart.destroy',$item->id)  }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>

            @endforeach
                        </tbody>
                    </table>

    </div>
    <h3 class="text-gray-700 py-5">
        Total Price :
        {{ \Cart::session(auth()->id())->getTotal() }} <small>Rsd.</small>
    </h3>
    <a name="" id="" class="btn btn-primary px-5 py-3" href="{{ route('cart.checkout') }}" role="button">Checkout ?</a>
</div>
@endsection
