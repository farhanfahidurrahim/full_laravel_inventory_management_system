<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {	
    	$product=DB::table('products')
    	->join('categories','products.cat_id','categories.id')
    	->select('categories.cat_name','products.*')
    	->get();
    	$customer=DB::table('customers')->get();
    	$category=DB::table('categories')->get();
    	return view('pos')->with(['prod' => $product, 'cust' => $customer, 'cat'=>$category]);
    	//return view('pos')->with('cust',$customer);
    }

    public function PendingOrders()
    {
    	$pendingOrd=DB::table('orders')
    		->join('customers','orders.customer_id','customers.id')
    		->select('customers.name','orders.*')
    		->where('order_status','pending')->get();
    	return view('pending_order')->with('pendord',$pendingOrd);
    }

    public function ViewOrder($id)
    {
    	$viewOrd=DB::table('orders')
    		->join('customers','orders.customer_id','customers.id')
    		->select('customers.*','orders.*')
    		->where('orders.id',$id)->first();

    	$view_Ord_dtls=DB::table('orderdetails')
    		->join('products','orderdetails.product_id','products.id')
    		->select('products.product_name','products.product_code','orderdetails.*')
    		->where('order_id',$id)->get();

    	return view('order_confirmation')->with(['vw_ordr' => $viewOrd, 'vw_ord_dtls' => $view_Ord_dtls]); 	
    }

    public function OrderDone($id)
    {
    	$approve=DB::table('orders')->where('id',$id)->update(['order_status' => 'success']);
    	if ($approve) {
                 $notification=array(
                 'messege'=>'Successfully Order Approved & Deliverd',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('pending.orders')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function SuccessOrder()
    {
    	$successOrd=DB::table('orders')
    		->join('customers','orders.customer_id','customers.id')
    		->select('customers.name','orders.*')
    		->where('order_status','success')->get();
    	return view('success_order')->with('successord',$successOrd);
    }
}
