@extends('layouts.app')

@section('content')
@foreach( $products as $product)



<div class="container">
  <div class="images">
    <img src="{{$product->image}}" />
  </div>
  <div class="slideshow-buttons">
    <div class="one"></div>
    <div class="two"></div>
    <div class="three"></div>
    <div class="four"></div>
  </div>
  <p class="pick">choose size</p>
  <div class="sizes">
    <div class="size">5</div>
    <div class="size">6</div>
    <div class="size">7</div>
    <div class="size">8</div>
    <div class="size">9</div>
    <div class="size">10</div>
    <div class="size">11</div>
    <div class="size">12</div>
  </div>
  <div class="product">
    <p>Women's Running Shoe</p>
    <h1>{{$product->title}}</h1>
    <h2>{{$product->price}}</h2>
    <p class="desc">{{$product->description}}</p>
    <div class="buttons">
      <button class="add">Add to Cart</button>
      <button class="like"><span>♥</span></button>
    </div>
  </div>
</div>

@endforeach
@endsection