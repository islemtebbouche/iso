@extends('layouts.app')

@section('content')


<div >

    
            <div class="card p-4 mt-3"id="store">
                <h3 class="heading mt-5 text-center">Hi! How can we help You?</h3>
                <div class="d-flex justify-content-center px-5">

                    
                    <form class="form-inline my-2 my-lg-0 mx-auto" action="/products" method="POST" >
      @csrf
        <input class="form-control" type="text" placeholder="Search for products..." aria-label="Search"  name="q" id="q">
        <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
                    </div>


                <div class="row mt-4 g-1 px-4 mb-5">
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/Mb8kaPV.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Account</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/ueLEPGq.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Payments</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/tmqv0Eq.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Delivery</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/D0Sm15i.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Product</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/Z7BJ8Po.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Return</span> </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-inner p-3 d-flex flex-column align-items-center"> <img src="https://i.imgur.com/YLsQrn3.png" width="50">
                            <div class="text-center mg-text"> <span class="mg-text">Guarantee</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>
<div class="container">
	
   
		<div class="col-md-12">
			<h2 >latest<b style="color:lightblue">Products</b></h2>
			
					<div class="row">
                    @foreach( $latestProducts as $product)
					<div class="col-md-3 col-sm-6">
    <div class="product-grid">
        <div class="product-image">
            <a href="#" class="image">
                <img class="pic-1" src="{{$product->image}}">
            </a>
            <span class="product-discount-label">-33%</span>
            <ul class="product-links">
                <li><a href="{{ route ('wishlist.add', $product->id)}}" data-tip="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
                <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
        <div class="product-content">
            <ul class="rating">
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
                <li class="fas fa-star"></li>
                <li class="far fa-star"></li>
                <li class="far fa-star"></li>
            </ul>
            <h3 class="title"><a href="#">{{$product->title}}</a></h3>
            <div class="price"><span>{{$product->pricedel}}$</span> {{$product->price}}$</div>
            <a class="add-to-cart" href="{{ route ('cart.add', $product->id)}}">add to cart</a>
        </div>
    </div>
</div>
						@endforeach
	<!-- Footer -->
 
  <footer >
    <div class="container py-5">
      <div class="row py-4" id="footer">
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
</div>
@endsection