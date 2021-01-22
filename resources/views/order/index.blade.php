@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach($carts as $cart)
            <div class="card mb-3">
                <div class="card-body">
                   
                    <table class="table table-striped mt-2 mb-2">
                        <thead>
                            <tr>
                                
                                <th scope="col">Title</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->items as $item)
                            <tr>
                                
                                <td>{{$item['title'] }}</td>
                                <td>${{$item['price'] }}</td>
                                <td>{{$item['qty'] }}</td>
                                <td> Paid</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  
                </div>
            </div>
            <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$cart->totalPrice}}</p>
            @endforeach
        </div>
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