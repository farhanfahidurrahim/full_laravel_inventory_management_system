<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
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

    public function WebsiteSetting()
    {
    	$wb_stng=DB::table('settings')->first();
    	return view('setting_website')->with('wb_stng',$wb_stng);
    }

    public function UpdateWebstite(Request $request,$id)
    {
    	$data=array();
    	$data['company_name']=$request->company_name;
    	$data['company_address']=$request->company_address;
    	$data['company_email']=$request->company_email;
    	$data['company_phone']=$request->company_phone;
    	$data['company_logo']=$request->company_logo;
    	$data['company_mobile']=$request->company_mobile;
    	$data['company_city']=$request->company_city;
    	$data['company_country']=$request->company_country;
    	$data['company_zipcode']=$request->company_zipcode;

    	$image = $request->company_logo;

        if ($image) {
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['company_logo']=$image_url;
                $img=DB::table('settings')->where('id',$id)->first();
                $image_path=$img->company_logo;
                $done=unlink($image_path);

              $user=DB::table('settings')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'messege'=>'11111 Successfully Setting Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
                 return Redirect()->back();
             }      
                
            }
            }

            else{
              $oldphoto=$request->old_photo;
              if ($oldphoto) {
                $data['company_logo']=$oldphoto;
                $usr=DB::table('settings')->where('id',$id)->update($data);
                if ($usr) {
                 $notification=array(
                 'messege'=>'Successfully Setting Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
                } else{
                    return Redirect()->back();
                  }        
               
              }
            	
        }
    }
}
