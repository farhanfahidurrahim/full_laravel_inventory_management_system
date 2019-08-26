<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
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

    public function AddCategory()
    {
    	return view('add_category');
    }

    public function InsertCategory(Request $request)
    {	
    	$data=array();
    	$data['cat_name']=$request->cat_name;

    	$in_cat=DB::table('categories')->insert($data);
    	if ($in_cat) {
                 $notification=array(
                 'messege'=>'Successfully Catgory Inserted',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('add.category')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function AllCategory()
    {	
    	$all_cat=DB::table('categories')->get();
    	return view('all_category')->with('a_cat',$all_cat);
    }

    public function DeleteCategory($id)
    {
    	$dlt=DB::table('categories')->where('id',$id)->delete();
    	if ($dlt) {
                 $notification=array(
                 'messege'=>'Successfully Delete Categeory',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.category')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function EditCategory($id)
    {
    	$edt_cat=DB::table('categories')->where('id',$id)->first();
    	return view('edit_category')->with('e_cat',$edt_cat);
    }

    public function UpdateCategory(Request $request,$id)
    {
    	$data=array();
    	$data['cat_name']=$request->cat_name;

    	$up_cat=DB::table('categories')->where('id',$id)->update($data);
    	if ($up_cat) {
                 $notification=array(
                 'messege'=>'Successfully Category Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.category')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }
}
