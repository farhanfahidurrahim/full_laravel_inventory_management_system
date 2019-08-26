<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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

    public function AddProduct()
    {
    	return view('add_products');
    }

    public function InsertProduct(Request $request)
    {
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['cat_id']=$request->cat_id;
    	$data['sup_id']=$request->sup_id;
    	$data['product_code']=$request->product_code;
    	$data['product_storage']=$request->product_storage;
    	$data['product_route']=$request->product_route;
    	$data['product_image']=$request->product_image;
    	$data['buy_date']=$request->buy_date;
    	$data['expire_date']=$request->expire_date;
    	$data['buying_price']=$request->buying_price;
    	$data['selling_price']=$request->selling_price;

    	$image = $request->file('product_image');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $in_product=DB::table('products')
                         ->insert($data);
              if ($in_product) {
                 $notification=array(
                 'messege'=>'Successfully Product Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('add.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
            	
            }
        }else{
        	  return Redirect()->back();
        }
    }

    public function AllProduct()
    {	
    	$all_pro=DB::table('products')->get();
    	return view('all_product')->with('aprdct',$all_pro);
    }

    public function ViewProduct($id)
    {
      $vw_prod=DB::table('products')->where('id',$id)->first();
      return view('view_product')->with('vprod',$vw_prod);
    }
     
    public function DeleteProduct($id)
    {
      $dlt_prod=DB::table('products')->where('id',$id)->first();
      $image=$dlt_prod->product_image; unlink($image);
      $dltprod=DB::table('products')->where('id',$id)->delete();

      if ($dltprod) {
             $notification=array(
             'messege'=>'Successfully Product Deleted ',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.product')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }          
    }
    
    //Products Imposrt | Export....

    public function ImportProduct()
    {
      return view('import_product');
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function import(Request $request)
    {
        $import=Excel::import(new ProductsImport, $request->file('import_pro_file'));
        if ($import) {
             $notification=array(
             'messege'=>'Successfully Import Product',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.product')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }  
    }
}
