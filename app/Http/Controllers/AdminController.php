<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Review;
use App\Order;
use App\Category;
use App\User;
use App\Admin;
use App\Blacklist;
use App\Classes\geoplugin\geoPlugin;
use App\Reviewcount as rc;

class AdminController extends Controller
{

    public function leave(){
    	$product= product::all();
    	$review= review::all();
    	$category= Category::all();
    	$user=User::all();
    	$order=Order::all();
    	$admin=Admin::all();
        $rc=rc::all();
        $blacklist=blacklist::all();
    	return view('dashboard.leave')->with('category',$category)->with('product',$product)->with('review',$review)->with('user',$user)->with('order',$order)->with('admin',$admin)->with('blacklist',$blacklist)->with('rc',$rc);
    }
    public function store(Request $req, $category){
         switch ($category) {
            case 'products':
            // dd($req->all());
            $product= new Product;
            $input=$req->all();
            $product->fill($input)->save();
            return redirect()->route('show');
            break;

            case 'users':
            // dd($req->all());
            $user= new User;
            $input=$req->all();
            $user->fill($input)->save();
            return redirect()->route('show');
            break;

            case 'reviews':
            // dd($req->all());
            $review= new Review;
            $input=$req->all();
            $review->fill($input)->save();
            return redirect()->route('show');
            break;

             case 'reviewcount':
            $rc= new rc;
            $input=$req->all();
            $rc->fill($input)->save();
            return redirect()->route('show');
            break;

             case 'blacklist':
            // dd($req->all());
            $blacklist= new blacklist;
            $input=$req->all();
            $input = array_map(function($input)
            {
               $i=ucwords(strtolower($input));
              return $input=$i; 
            }, $input);
            // dd($input);
            // dd($blacklist);
            // dd($input);
            $blacklist->fill($input)->save();
            return redirect()->route('show');
            break;

            case 'orders':
            // dd($req->all());
            $order = new Order;
            $input=$req->all();
            $order->fill($input)->save();
            return redirect()->route('show');
            break;

            case 'category':
            $category= new Category;
            $input=$req->all();
            $category->fill($input)->save();
            return redirect()->route('show');
            break;

            case 'admin':
            $admin= new Admin;
            $input=$req->all();
            $admin->fill($input)->save();
            return redirect()->route('show');
            break;

            default:
                dd($category);
                break;
        }
    }

    public function create($category){
        switch ($category) {
            case 'products':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',6)->with('row',$res)->withcategory($category);
                break;
            case 'users':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',8)->with('row',$res)->withcategory($category);
                break;
            case 'reviews':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',8)->with('row',$res)->withcategory($category);
                break;
            case 'reviewcount':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',10)->with('row',$res)->withcategory($category);
                break;   
            case 'blacklist':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',4)->with('row',$res)->withcategory($category);
                break;
            case 'orders':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',10)->with('row',$res)->withcategory($category);
                break;
            case 'category':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',2)->with('row',$res)->withcategory($category);
                break;
            case 'admin':
            $res=Schema::getColumnListing($category);
            // dd($res);
            return view('dashboard.create')->with('num',3)->with('row',$res)->withcategory($category);
                break;
            default:
                dd($category);
                break;
        }
        return back();
    }
    public function delete(Request $req){
    	$row=$req->get('id');
    	$tb=$req->get('category');
    	// dd($tb);
    	if($tb == 'products'){
    		$obj=product::where('pid',$row)->delete();
    		// dd($obj);
    		// $obj->delete();
    	}
    	if($tb == 'users'){
    		$obj=User::where('id',$row)->delete();
    		// dd($obj);
    		// $obj->delete();
    	}
    	if($tb == 'reviews'){
    		$obj=Review::where('rid',$row)->delete();
    		// dd($obj);
    		// $obj->delete();
    	}
        if($tb == 'reviewcount'){
            $obj=rc::where('id',$row)->delete();
            // dd($obj);
            // $obj->delete();
        }
        if($tb == 'blacklist'){
            $obj=blacklist::where('id',$row)->delete();
            // dd($obj);
            // $obj->delete();
        }
    	if($tb == 'orders'){
    		$obj=Order::where('order_id',$row)->delete();
    		// dd($obj);
    		// $obj->delete();
    	}
    	if($tb == 'category'){
    		$obj=Category::where('cid',$row)->delete();
    		// dd($obj);
    		// $obj->delete();
    	}
    	// return url('admin/test');
        return back();
    }
    /**
    *
    */
    public function edit(Request $req){
    	$row=$req->get('id');
    	$tb=$req->get('category');
    	// dd($tb);
    	if($tb == 'products'){
    		$obj=product::where('pid',$row)->get();
    		return view('dashboard.edit')->with('num',6)->with('row',$obj->toArray()[0])->withcategory('products');
    	}
    	if($tb == 'users'){
    		$obj=User::where('id',$row)->get();
    		return view('dashboard.edit')->with('num',8)->with('row',$obj->toArray()[0])->withcategory('users');
    	}
    	if($tb == 'reviews'){
    		$obj=Review::where('rid',$row)->get();
    		return view('dashboard.edit')->with('num',8)->with('row',$obj->toArray()[0])->withcategory('reviews');
    	}
        if($tb == 'reviewcount'){
            $obj=rc::where('id',$row)->get();
            return view('dashboard.edit')->with('num',10)->with('row',$obj->toArray()[0])->withcategory('reviewcount');
        }
        if($tb == 'blacklist'){
            $obj=blacklist::where('id',$row)->get();
            return view('dashboard.edit')->with('num',3)->with('row',$obj->toArray()[0])->withcategory('blacklist');
        }
    	if($tb == 'orders'){
    		$obj=Order::where('order_id',$row)->get();
    		return view('dashboard.edit')->with('num',10)->with('row',$obj->toArray()[0])->withcategory('orders');
    	}
    	if($tb == 'category'){
    		$obj=Category::where('cid',$row)->get();
    		// dd($row);
    		// dd($obj);
    		return view('dashboard.edit')->with('num',2)->with('row',$obj->toArray()[0])->withcategory('category');
    	}
    }
    public function update(Request $req){
    	$tb=$req->get('category');
    	// dd($row);
    	if($tb == 'products'){
            $input=$req->except(['category']);
    		$obj=product::where('pid',$req->get('pid'))->update($input);
    		// dd($req->get('info'));
    		
    		return redirect()->route('show');
    	}
    	if($tb == 'users'){
    		$input=$req->except(['category']);
            $obj=User::where('id',$req->get('id'))->update($input);
    		
            return redirect()->route('show');
    	}
    	if($tb == 'reviews'){
            $input=$req->except(['category']);
    		$obj=Review::where('rid',$req->get('rid'))->update($input);
    		// `rid`, `pid`, `pname`, `username`, `email`, `review`, `ip`, `stars`
            return redirect()->route('show');
    	}
        if($tb == 'reviewcount'){
            $input=$req->except(['category']);
            $obj=rc::where('id',$req->get('id'))->update($input);
            // `rid`, `pid`, `pname`, `username`, `email`, `review`, `ip`, `stars`
            return redirect()->route('show');
        }
        if($tb == 'blacklist'){
            $input=$req->except(['category']);
            $input = array_map(function($input)
            {
               $i=ucwords(strtolower($input));
              return $input=$i; 
            }, $input);
            $obj=blacklist::where('id',$req->get('id'))->update($input);
            // `rid`, `pid`, `pname`, `username`, `email`, `review`, `ip`, `stars`
            return redirect()->route('show');
        }
    	if($tb == 'orders'){
            $input=$req->except(['category']);

    		$obj=Order::where('order_id',$req->get('order_id'))->update($input);
    		// `order_id`, `username`, `email`, `pid`, `pname`, `price`, `quantity`, `total`, `address`, `date`
    		
            return redirect()->route('show');
    		
    	}
    	if($tb == 'category'){
            $input=$req->except(['category']);
    		$obj=Category::where('cid',$req->get('cid'))->update($input);
    		// `cid`, `cname`
            return redirect()->route('show');
    		
    	}
    	return url('admin/test');
    }
}

