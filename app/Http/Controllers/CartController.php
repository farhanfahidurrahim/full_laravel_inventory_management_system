<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
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

    public function AddCart(Request $request)
    {
    	$data=array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']=$request->qty;
    	$data['price']=$request->price;

    	$addcart=Cart::add($data);
    	if ($addcart) {
                 $notification=array(
                 'messege'=>'Successfully Cart Add',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function UpdateCart(Request $request,$rowId)
    {
    	$qty=$request->qty;

    	$update_cart=Cart::update($rowId, $qty);
    	if ($update_cart) {
                 $notification=array(
                 'messege'=>'Successfully Update Cart',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function DeleteCart($rowId)
    {
    	$delete_cart=Cart::remove($rowId);
    	if ($delete_cart) {
                 $notification=array(
                 'messege'=>'Successfully Delete Cart',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function InvoiceCart(Request $request)
    {
    	$request->validate([
			'cus_id' => 'required',
		],
		[
			'cus_id.required'=>'Please select a customer',
		]);

		$cus_id=$request->cus_id;
		$cus=DB::table('customers')->where('id',$cus_id)->first();

		$content=Cart::content();

    	return view('invoice_cart')->with(['cus'=>$cus,'cont'=>$content]);

    }

    public function FinalInvoice(Request $request)
    {
    	$data=array();
    	$data['customer_id']=$request->customer_id;
    	$data['order_date']=$request->order_date;
    	$data['order_status']=$request->order_status;
    	$data['total_products']=$request->total_products;
    	$data['sub_total']=$request->sub_total;
    	$data['vat']=$request->vat;
    	$data['total']=$request->total;
    	$data['payment_status']=$request->payment_status;
    	$data['pay']=$request->pay;
    	$data['due']=$request->due;

    	$order_id=DB::table('orders')->insert($data);

    	$ocontent=Cart::content();
    	$odata=array();
    	foreach ($ocontent as $row) {
    		$odata['order_id']=$order_id;
    		$odata['product_id']=$row->id;
    		$odata['quantity']=$row->qty;
    		$odata['unitcost']=$row->price;
    		$odata['total']=$row->total;
    	}

    	$in_odr=DB::table('orderdetails')->insert($odata);

    	if ($in_odr) {
                 $notification=array(
                 'messege'=>'Successfully Done',
                 'alert-type'=>'success'
                  );
                 Cart::destroy();
                return Redirect()->route('pending.orders')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error exeption',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             }
    	
    }
}
