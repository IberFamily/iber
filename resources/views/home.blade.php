@extends('layouts.app')

@section('content')

<style>
    .homeContainer{
        width: 100%;
        height: 90vh;
        background-image: url("images/pizza.jpg");
        background-attachment: fixed;
        background-position: top;
        background-size: cover;

    }
    .reclamSec{
        width: 100%;
        height: 50vh;
        background-image: url("images/13.jpg");
        background-attachment: fixed;
        background-position: top;
        background-size: cover;
    }
    .homeOverlay{
        width: 100%;
        height: 90vh;
        background:#0000005b;
    }
    .recOverlay{
        width: 100%;
        height: 50vh;
        background:#0000005b;
    }
    .containerItem{
        width:80vw;
        margin: auto;
    }

</style>
<div class="homeContainer">
    <div class="homeOverlay">
        <h1 style="font-size: 4vw; padding-top:20vh; padding-left:5%; font-weight:bold" class="text-left text-white ">
            <strong>IBER</strong> Donosi Sve !
        </h1>
        <h2 style="padding-left: 5%" class="pl-4 text-white">Samo te jedan poziv deli od svoje  <strong>omiljene klope</strong></h2>
        <h4 style="padding:0 60% 0 5%; margin-top:4vh;" class="text-white text-left ">Sve sto pozelis moze biti na tojoj adresi u roku od pola sata. Sa Iberom mozes sve! Na otvaranju imas <strong>50%</strong> Popusta na svaki artikal koj narucis!</h4>
        <a style=" margin-top:10vh; margin-left:5%;" href="#" class="btn  btn-secondary py-3 px-5">Naruci odmah</a>
    </div>
</div>

<div  style="margin-top:-10vh;"class="containerItem mb-5 bg-gray-100 rounded px-5">
    <h1 class="text-gray-700 pt-5  text-center" style="height:20vh;" >Today's offer</h1>
    <div class="row my-5">
        <h2 class="ml-4">produkt sa najbojim ocenama! npr</h2>
    </div>

<div style="margin-bottom:20vh;" class="row mt-5">
@foreach ($products as $product)

<div class="card m-auto px-0 mb-3 my-5"style="max-width: 35vw; height:25vh;">
    <div class="row">
      <div class="col-md-6 ">
        <img  style="width:20vw; height:25vh;" class="card-img-top"  src="{{ asset('images/koktel.jpg') }}" alt="Card image cap">
      </div>
      <div class="col-md-6 col-sm-12" >
        <div class="card-body">

            <h4 class="card-title">{{$product->name}}</h4>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">{{$product->price}} Rsd.</p>
            <a href="{{ route('cart.add', $product->id) }}" class="card-link btn btn-primary ">Add to cart</a>
        </div>
      </div>
    </div>
  </div>

@endforeach
</div>
</div>
<div class="reclamSec mt-5">
    <div class="recOverlay">
        <div style="width:40vw" class="m-auto">
            <h1 class="text-white py-5">Neki teks top!</h1>
            <h5 class="px-2 text-white py-5"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis minima veritatis saepe aliquid voluptate eveniet quam esse id obcaecati! Vitae provident quisquam explicabo quaerat distinctio, repudiandae ea iusto quae accusamus!</h5>
            <a href="{{ route('cart.add', $product->id) }}" class="m-auto card-link btn btn-primary ">Add to cart</a>
        </div>
    </div>
</div>

<div class="container">
<div class="header py-5">
    <h1 class="py-5"> Restorani sa najbboljom ocenom</h1>
</div>
<div style="margin-bottom:20vh;" class="row mt-5 ">
    @foreach ($showShops as $shop)

<div class="card m-auto px-0 mb-3 my-5"style="max-width: 30vw; height:25vh;">
    <div class="row">
      <div class="col-md-6 ">
        <img  style="width:20vw; height:25vh;" class="card-img-top"  src="{{ asset('https://cdn.pixabay.com/photo/2015/11/26/22/28/woman-1064664_960_720.jpg') }}" alt="Card image cap">
      </div>
      <div class="col-md-6 col-sm-12" >
        <div class="card-body">
            <h4 class="card-title pt-4">{{$shop->name}}</h4>
            <p class="card-text">{{$shop->description}}</p>
            <p class="card-text">{{$shop->price}} Rsd.</p>

        </div>
      </div>
    </div>
  </div>

@endforeach
</div>
</div>
@endsection
