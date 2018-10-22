<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Review;
use App\Order;
use App\Blacklist;
use App\Classes\geoplugin\geoPlugin;
use App\Reviewcount as rc;

class productcontroller extends Controller
{
    public function getip(){
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        $c='first';
       }
//whether ip is from proxy
         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
         $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
         $c='second';
       }
//whether ip is from remote address
         else{
          $c='third';
         $ip_address = $_SERVER['REMOTE_ADDR'];
        }
        return $ip_address;
     }
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
        $rc= new rc;
        $product= Product::where('pid', $req->Input('pid'))->get();

        $review->fill($req->all());
        $review->ip=$this->getip();

        if ($rc->where('username',$review->username)->where('pname',$review->pname)->doesntExist()) {
         $rc->fill($req->except(['rid','pid','email']));
         $rc->ip=$review->ip;
         $rc->count=1;
        }

        //get location data
        $geoplugin = new geoPlugin();
        $geoplugin->locate();
        $city=$geoplugin->city;
        $country=$geoplugin->countryName;
        $ip=$geoplugin->ip;
        //check blacklist for blacklisted entries and revoke any attempt to make a review
        if(DB::table('blacklist')
                    ->where('ip_addresses',$ip)
                    ->orWhere('countries', $country)
                    ->orWhere('cities',$city)->exists()
                   )
        {
         $rc->fill([null]);
         return view('review')->with('banned','')->with('product',$product);
        }
        date_default_timezone_set('Africa/Nairobi');
        //if they have just recently posted a review
        
        $updated= strtotime(DB::table('reviewcount')->select('updated_at')->where('username',$review->username)->first()->updated_at);
        $currentTime = time(); // current time in format 
        $difference = (int)($currentTime - $updated);// difference in time in seco
        // $updated = date("Y-m-d H:i:s a",time());
        // $seconds= date('d h:i:s', (string)$difference);
        // $difference = date('m/d/Y h:i:s a', $difference);
        // dd($updated);
        // var_dump($difference);
        // var_dump(DB::table('reviewcount')->where('username',$review->username)->first());
        // die();
        if($difference<60){
         DB::table('blacklist')->insert(['ip' => $ip]);
         return view('review')->with('banned','')->with('product',$product);
        }
        if(rc::where('username',$review->username)->where('pname',$review->pname)->exists()){
         //if they have submitted a review before
         return view('review')->with('exceeds','')->with('product',$product);
        }
        else{
         // if there are no previous reviews
         $rc->save();
        }
        $review->save();
        
        
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
