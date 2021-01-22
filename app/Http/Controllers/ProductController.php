<?php

namespace App\Http\Controllers;

use App\Cart;
use App\wishlist;
use App\Product;
use App\storeimage;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function search ( Request $request ){
        $request->validate([
            'q'=>'required'

        ]);
        $q = $request->q;
        $filteredproducts = Product::where('title','like','%'.$q.'%')->get();
        if ($filteredproducts ->count()) {
           return view('product.search')->with ([
               'Product'=> $filteredproducts
           ]);
        } else {
            // return redirect ('/products')->with([
            //     'status'=>'search failed .... please try again'
                return redirect('/products')->with([
                    
                    Alert::toast('product not found', 'error')

                ]);
            // ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $cart = new Cart( session()->get('cart'));
        $cart->remove($product->id);

        if( $cart->totalQty <= 0 ) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product was removed');
    }

    public function addToCart(Product $product) {
        
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        //dd($cart);
        session()->put('cart', $cart);
        return redirect()->route('product.index')->with([
            Alert::toast('product was added', 'success')

        ]);
    }
    public function addTowishlist(Product $product) {
        
        if (session()->has('wishlist')) {
            $wishlist = new wishlist(session()->get('wishlist'));
        } else {
            $wishlist = new wishlist();
        }
        $wishlist->add($product);
        //dd($cart);
        session()->put('wishlist', $wishlist);
        return redirect()->route('product.index')->with([
            Alert::toast('product was added', 'success')

        ]);
    }


    public function showCart() {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('cart.show', compact('cart'));
    }

    public function checkout($amount) {
    
            return view('cart\chekout',compact('amount'));
    }

    public function charge(Request $request) {

        //dd($request->stripeToken);
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount'   => $request->amount,
            'description' => ' Test from laravel new app'
        ]);

        $chargeId = $charge['id'];

        if ($chargeId) {
            // save order in orders table ...
            auth()->user()->orders()->create([
                'cart' => serialize( session()->get('cart'))
            ]);
            // clearn cart 

            session()->forget('cart');  
            return redirect()->route('store')->with('success', " Payment was done. Thanks");
        } else {
            return redirect()->back();
        }
    }
}