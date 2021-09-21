@extends('layouts.app')


@section('content')

<div class="container">
    <h2 class="pt-5">Checkout</h2>


<h3 class="py-4">Delivery Information</h3>

<form  action="{{ route('orders.store') }}" method="post">
    @csrf

    <div class="form-group py-2">
        <label class="py-3" for="">Full Name</label>
        <input type="text" name="deliver_fullname" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label class="py-3" for="">Address</label>
        <input type="text" name="delivery_address" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label class="py-3" for="">City</label>
        <input  type="text" name="delivery_city" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label class="py-3"  for="">State</label>
        <input type="text" name="delivery_state" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label  class="py-3" for="">Zip Code</label>
        <input  type="text" name="delivery_zipcode" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label class="py-3" for="">Phone Number</label>
        <input type="text" name="delivery_phone" class="form-control" required>
    </div>
    <div class="form-group py-2">
        <label class="py-3" for="">Notes</label>
        <textarea  type="text" name="notes" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary my-4">Submit</button>
</form>
</div>



@endsection
