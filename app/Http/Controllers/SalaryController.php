<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
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

    public function AddAdvancedSalary()
    {
    	return view('add_advanced_salary');
    }

    public function InsertAdvancedSalary(Request $request)
    {   
        $emp_id=$request->emp_id;
        $month=$request->month;

        $inadvncdslry=DB::table('advance_salaries')
                ->where('emp_id',$emp_id)
                ->where('month',$month)
                ->first();

        if ($inadvncdslry === NULL) {

            $validateData = $request->validate([
            'emp_id' => 'required|max:255',
            'month' => 'required',
            'year' => 'required',
            'advancedsalary' => 'required',
            ]); 

            $data=array();
            $data['emp_id']=$request->emp_id;
            $data['month']=$request->month;
            $data['year']=$request->year;
            $data['advancedsalary']=$request->advancedsalary;

            $inadvncdslry=DB::table('advance_salaries')->insert($data);

            if ($inadvncdslry) {
                     $notification=array(
                     'messege'=>'Successfully Advance Salary Paid',
                     'alert-type'=>'success'
                      );
                    return Redirect()->route('addadvncd.salary')->with($notification);                      
                 }else{
                  $notification=array(
                     'messege'=>'Failed To Advance Salary',
                     'alert-type'=>'success'
                      );
                     return Redirect()->back()->with($notification);
                 } 
            }else{
                $notification=array(
                     'messege'=>'Advanced Salary Paid This Month!!! ',
                     'alert-type'=>'error'
                      );
                     return Redirect()->back()->with($notification);
            }

    }

    public function AllAdvancedSalary()
    {   
        $alladvncdslry=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
            ->orderBy('id','DESC')
            ->get();
        return view('all_advanced_salary')->with('aladvnslry',$alladvncdslry);
    }

    public function ViewAdvancedSalary($id)
    {
        $view=DB::table('advance_salaries')
            ->join('employees','advance_salaries.emp_id','employees.id')
            ->select('advance_salaries.*','employees.*')
            ->where('advance_salaries.id',$id)
            ->first();
        return view('view_advanced_salary')->with('views',$view);
    }

    public function EditAdvancedSalary($id)
    {
        $edit=DB::table('advance_salaries')->where('id',$id)->first();
        return view('edit_advanced_salary')->with('editas',$edit);
    }

    public function UpdateAdvancedSalary(Request $request,$id)
    {
        $data=array();
            $data['month']=$request->month;
            $data['year']=$request->year;
            $data['advancedsalary']=$request->advancedsalary;

            $update=DB::table('advance_salaries')->where('id',$id)->update($data);

            if ($update) {
                     $notification=array(
                     'messege'=>'Successfully Advance Salary Update',
                     'alert-type'=>'success'
                      );
                    return Redirect()->route('alladvncd.salary')->with($notification);                      
                 }else{
                  $notification=array(
                     'messege'=>'Failed To Update',
                     'alert-type'=>'success'
                      );
                     return Redirect()->back()->with($notification);
                 } 
            
    }

    public function DeleteAdvancedSalary($id)
    {
        $delete=DB::table('advance_salaries')->where('id',$id)->delete();

        if ($delete) {
                     $notification=array(
                     'messege'=>'Successfully Advance Salary Delete',
                     'alert-type'=>'success'
                      );
                    return Redirect()->route('alladvncd.salary')->with($notification);                      
                 }else{
                  $notification=array(
                     'messege'=>'Failed To Delete',
                     'alert-type'=>'success'
                      );
                     return Redirect()->back()->with($notification);
                 } 
    }

    //////////////.....................

    public function PaySalary()
    {   
        $employee=DB::table('employees')->get();
        return view('pay_salary')->with('employee',$employee);


    }
}
