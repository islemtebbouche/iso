@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            @if($cart)
            
                    
                          
                            <div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col">
                        <h4><b>Shopping Cart</b></h4>
                    </div>
                    <div class="col align-self-center text-right text-muted">{{$cart->totalQty}} items</div>
                </div>
            </div>
            @foreach( $cart->items as $product)
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="{{ $product['image'] }}"></div>
                    <div class="col">
                        <div class="row text-muted">{{ $product['title'] }}</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col"> <a href="#">-</a><a href="#" class="border">{{ $product['qty']}}</a><a href="#">+</a> </div>
                    <div class="col">&euro; {{ $product['price'] }}
                    <form action="{{ route('product.remove', $product['id'] )}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="close" type="submit" class="btn btn-danger btn-sm ml-4 float-right" >Remove</button>
                                            </div>
                </div>
            </div>
            @endforeach
            <div class="back-to-shop"><a href="{{route('product.index')}}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
                    
                    <!-- <p><strong>Total : ${{$cart->totalPrice}}</strong></p>

            </div>

            <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-titel">
                        Your Cart
                        <hr>    
                    </h3>
                    <div class="card-text">
                        <p>
                        Total Amount is ${{$cart->totalPrice}}
                        </p>
                        <p>
                        Total Quantities is {{$cart->totalQty}}
                        </p>
                        <a href="{{ route('cart.checkout', $cart->totalPrice)}}" class="btn btn-info">Chekout</a>
                    </div>
                </div>
            </div>
            </div> -->
            <div class="col-md-4 summary">
            <div>
                <h5><b>Summary</b></h5>
            </div>
            <hr>
            <div class="row">
                <div class="col" style="padding-left:0;">ITEMS {{$cart->totalQty}}</div>
                <div class="col text-right">&euro; {{$cart->totalPrice}}</div>
            </div>
            <form>
                <p>SHIPPING</p> <select>
                    <option class="text-muted">Standard-Delivery- &euro;5.00</option>
                </select>
                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right">&euro; {{$cart->totalPrice}}</div>
            </div><a href="{{ route('cart.checkout', $cart->totalPrice)}}"><button id="bt" class="btn">CHECKOUT</button></a> 
        </div>
            @else
            <div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="ca">
                <div class="ca-header">
                    
                </div>
                <div class="ca-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="{{route('product.index')}}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            @endif
        </div>
    </div>
<!-- Footer -->
<nav class="navbar sticky-bottom">
 <div class="container-fluid">
  <footer class="bg-white ">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="img/logo.png" alt="" width="180" class="mb-3">
          <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">For Women</a></li>
            <li class="mb-2"><a href="#" class="text-muted">For Men</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Stores</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">Login</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Register</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Wishlist</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
          <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
  </footer>
</div>
</nav>
@endsection