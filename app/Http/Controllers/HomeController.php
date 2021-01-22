<?php

namespace App\Http\Controllers;

use App\product;
use App\storeimage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('product.index')->with([
            Alert::toast('You are logged in', 'success')

        ]);
        
    }
    public function products(){
        Alert::warning('Warning Title', 'Warning Message');

        if ( session('status')) {
            toast(session('Warning Toast'),'warning');

        }
    }
    public function store()
    {
        if ( session('success'))
        {
            toast(session('success'), 'success');
        }
        
        $latestProducts = product::latest()->take(4)->get();
        return view('store',compact('latestProducts'));
    }
    public function storeimage(){
        $storeimages = storeimage::take(1)->get() ;

    }
}
