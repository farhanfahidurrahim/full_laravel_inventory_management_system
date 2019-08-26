<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
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

    public function AddEmployee()
    {
    	return view('add_employee');
    }

    public function InsertEmployee(Request $request)
    {
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|unique:employees|max:255',
        'nid_number' => 'required|unique:employees|max:255',
        'address' => 'required',
        'phone' => 'required|max:255',
        'photo' => 'required',
        'salary' => 'required',
    ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['experience']=$request->experience;
    	$data['nid_number']=$request->nid_number;
    	$data['salary']=$request->salary;
    	$data['vacation']=$request->vacation;
    	$data['city']=$request->city;

    	$image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('add.employee')->with($notification);                      
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

    public function AllEmployee()
    {
    	$allemp=DB::table('employees')->get();
		return view('all_employee')->with('aemp',$allemp);
    }

    public function ViewEmployee($id)
    {
    	$vwemp=DB::table('employees')->where('id',$id)->first();
		
		return view('view_employee')->with('vemp',$vwemp);
    }

    public function DeleteEmployee($id)
    {
		$dlt=DB::table('employees')->where('id', $id)->first();

		$img=$dlt->photo;
			unlink($img);

		$dltuser=DB::table('employees')->where('id', $id)->delete();

          if ($dltuser) {
             $notification=array(
             'messege'=>'Successfully Employee Deleted ',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.employee')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }      		
    }

    public function EditEmployee($id)
    {
    	$editemp=DB::table('employees')->where('id',$id)->first();
    	return view('edit_employee')->with('eemp',$editemp);
    }

    public function UpdateEmployee(Request $request, $id)
    {	
    	$validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'nid_number' => 'required|max:255',
        'address' => 'required',
        'phone' => 'required|max:255',
        'salary' => 'required',
    ]);

    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['experience']=$request->experience;
    	$data['nid_number']=$request->nid_number;
    	$data['salary']=$request->salary;
    	$data['city']=$request->city;
      $data['vacation']=$request->vacation;

    	$image = $request->photo;

        if ($image) {
            $image_name= str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);
              $user=DB::table('employees')->where('id',$id)->update($data);
              if ($user) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
             }else{
                 return Redirect()->back();
             }      
                
            }
            }

            else{
              $oldphoto=$request->old_photo;
              if ($oldphoto) {
                $data['photo']=$oldphoto;
                $usr=DB::table('employees')->where('id',$id)->update($data);
                if ($usr) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
                } else{
                    return Redirect()->back();
                  }        
               
              }
            	
            
            }
	  }    	    
}