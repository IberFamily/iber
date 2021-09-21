@extends('layouts.app')


@section('content')



<h2 class="pb-4">Register your shop</h2>

<form action="{{ route('shops.store') }}" method="post">

    @csrf
    <div class="form-group py-3">
            <input type="text" class="form-control" name="name" placeholder="Shop name">
    </div>
    <div class="form-group py-3">
            <input type="text" class="form-control" name="description" placeholder="Shop description">
    </div>
    <div class="form-group py-3">
            <input type="text" class="form-control" name="delivery_cost" placeholder="Shop delivery_cost">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>





@endsection
