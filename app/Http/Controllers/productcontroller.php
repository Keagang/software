<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Review;
use App\Order;

class productcontroller extends Controller
{
    public function index()
    {
    	$product= product::all();
    	return view('welcome')->with('products',$product);
    }
    public function mensproduct(){
    	$mens= Product::where('category',1)->get();
    	//return "$mens";
    	return view('mens')->with('mens',$mens);
    }
    public function menpage($pid){

    	$product= Product::where('pid', $pid)->get();
        $category='men';
        $review=  Review::where('pid', $pid)->get();
        // return $review;
        return view('productpage')->with('product', $product)->with("men", $category)->with("review", $review);
    }

    public function makereview(Request $req){
        $review= new Review;
        $stars  = $req->get('rating');
        dd($stars);
        $comment=$req->get('comment');
        $id=$req->get('pid');
        $review->pid=$id;
        $review->review=$comment;
        // dd($review);
        $review->save();
        $product= Product::where('pid', $req->Input('pid'))->get();
        
        return view('review')->with('review','Review Added!')->with('product',$product);
    }
    
    public function makeorder(Request $req){
        $order= new Order;
        $order->quantity= $req->Input('order');
        $order->pid= $req->Input('pid');
        $order->pname= $req->Input('pname');
        $order->price= $req->Input('price');
        
        $order->save();
        $product= Product::where('pid', $req->Input('pid'))->get();
        
        $OrderSuccess="Order Made!";
            
        return view('review')->with('OrderSuccess',$OrderSuccess)->with('product',$product);
    }
        

}




// function get_client_ip() {
//     $ipaddress = '';
//     if (isset($_SERVER['HTTP_CLIENT_IP']))
//         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     else if(isset($_SERVER['HTTP_X_FORWARDED']))
//         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
//         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//     else if(isset($_SERVER['HTTP_FORWARDED']))
//         $ipaddress = $_SERVER['HTTP_FORWARDED'];
//     else if(isset($_SERVER['REMOTE_ADDR']))
//         $ipaddress = $_SERVER['REMOTE_ADDR'];
//     else
//         $ipaddress = 'UNKNOWN';
//     return $ipaddress;
// }
