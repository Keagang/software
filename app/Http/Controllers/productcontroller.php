<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class productcontroller extends Controller
{
    public function index()
    {
    	$product= product::all();
    	return view('welcome')->with('products',$product);
    }
    public function mensproduct(){
        return 'h';
    	$mens= Product::where('category',1)->get();
    	//return "$mens";
    	return view('mens')->with('mens',$mens);
    }
    public function menpage($pid){
    	$product= Product::where('pid', $pid)->get();
    	//return $product;
    	$category='men';
    	return view('productpage')->with('product', $product)->with("men", $category);
    }
}
