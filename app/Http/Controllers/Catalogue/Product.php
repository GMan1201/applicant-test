<?php

namespace App\Http\Controllers\Catalogue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product extends Controller
{
	
    public function index()
    {
        return view('catalogue.index')
        ->with('products', \App\Models\Product::all());
    }
	/*
	  public function index()
    {
        return view('catalogue.index')
        ->with('products', \App\Models\Product::all());
    }
  */

    public function cart()
    {
        return view('cart');
    }
  

    public function addToCart($id)
    {
        $product = \App\Models\Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            return redirect()->back()->with('success', 'Product already in the basket!');
        } else {
            $cart[$id] = [
                "name" => $product->sku,
				"description" => $product->description,
                "price" => $product->price
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to basket successfully!');
    }
  

    public function clearCart()
    {
            $cart = session()->get('cart');
            if(isset($cart)) {
				session()->forget('cart');
               
            }
            return redirect()->back()->with('success', 'Basket cleared successfully!');
        }
 
	

}

