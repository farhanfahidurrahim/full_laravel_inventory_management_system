<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
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

    public function AddSupplier()
    {
    	return view('add_supplier');
    }

    public function InsertSupplier(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:suppliers',
    ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['type']=$request->type;
    	$data['shop']=$request->shop;
    	$data['accountholder']=$request->accountholder;
    	$data['accountnumber']=$request->accountnumber;
    	$data['bankbranch']=$request->bankbranch;
    	$data['bankname']=$request->bankname;
    	$data['city']=$request->city;

    	$image = $request->file('photo');
    	if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $supplier=DB::table('suppliers')
                         ->insert($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('add.supplier')->with($notification);                      
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

    public function AllSupplier()
    {
    	$allspl=DB::table('suppliers')->get();
    	return view('all_supplier')->with('aspl',$allspl);
    }

    public function ViewSupplier($id)
    {	
    	$viewsplr=DB::table('suppliers')->where('id',$id)->first();
    	return view('view_supplier')->with('vsplr',$viewsplr);
    }

    public function EditSupplier($id)
    {
      $edt_splr=DB::table('suppliers')->where('id',$id)->first();
      return view('edit_supplier')->with('esplr',$edt_splr);
    }

    public function UpdateSupplier(Request $request,$id)
    {
      $data=array();
      $data['name']=$request->name;
      $data['email']=$request->email;
      $data['phone']=$request->phone;
      $data['address']=$request->address;
      $data['type']=$request->type;
      $data['shop']=$request->shop;
      $data['accountholder']=$request->accountholder;
      $data['accountnumber']=$request->accountnumber;
      $data['bankbranch']=$request->bankbranch;
      $data['bankname']=$request->bankname;
      $data['city']=$request->city;

      $image = $request->photo;

        if ($image) {
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('suppliers')->where('id',$id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);
              $user=DB::table('suppliers')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
                 return Redirect()->back();
             }      
                
            }
            }

            else{
              $oldphoto=$request->old_photo;
              if ($oldphoto) {
                $data['photo']=$oldphoto;
                $usr=DB::table('suppliers')->where('id',$id)->update($data);
                if ($usr) {
                 $notification=array(
                 'messege'=>'Successfully Supplier Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
                } else{
                    return Redirect()->back();
                  }        
               
              }
              
            
            }
    }

    public function DeleteSupplier($id)
    {
      $dlt_splr=DB::table('suppliers')->where('id',$id)->delete();

      if ($dlt_splr) {
             $notification=array(
             'messege'=>'Successfully Supplier Deleted ',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.supplier')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }  
    }
}
