<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
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

    public function AddExpense()
    {
		return view('add_expense');    	
    }

    public function InsertExpense(Request $request)
    {
    	$data=array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['date']=$request->date;
    	$data['month']=$request->month;
    	$data['year']=$request->year;

    	$in_expns=DB::table('expenses')->insert($data);
    	if($in_expns){
    		$notification=array(
    			'messege'=>'Successfully Inserted Expense',
    			'alert-type'=>'success'
    			);
    		return Redirect()->route('add.expense')->with($notification);  
    	}else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }

    }

    public function TodayExpense()
    {	
    	$date=date("d/m/y");
    	$tdy_expns=DB::table('expenses')->where('date',$date)->get();
    	return view('today_expense')->with('tdy_expns',$tdy_expns);
    }

    public function EditTodayExpense($id)
    {
        $edit=DB::table('expenses')->where('id',$id)->first();
        return view('edit_today_expense')->with('editt',$edit);
    }

    public function UpdateTodayExpense(Request $request,$id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $update=DB::table('expenses')->update($data);
        if($update){
            $notification=array(
                'messege'=>'Successfully Update Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('monthly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function DeleteTodayExpense($id)
    {
        $delete=DB::table('expenses')->where('id',$id)->delete();
        if($delete){
            $notification=array(
                'messege'=>'Successfully Delete Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('yearly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function MonthlyExpense()
    {
    	$month=date("F");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function EditMonthlyExpense($id)
    {
        $edit=DB::table('expenses')->where('id',$id)->first();
        return view('edit_monthly_expense')->with('editm',$edit);
    }

    public function UpdateMonthlyExpense(Request $request,$id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $update=DB::table('expenses')->update($data);
        if($update){
            $notification=array(
                'messege'=>'Successfully Update Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('monthly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function DeleteMonthlyExpense($id)
    {
        $delete=DB::table('expenses')->where('id',$id)->delete();
        if($delete){
            $notification=array(
                'messege'=>'Successfully Delete Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('yearly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function YearlyExpense()
    {
    	$year=date("Y");
    	$year_expns=DB::table('expenses')->where('year',$year)->get();
    	return view('yearly_exepense')->with('yr_exp',$year_expns);
    }

    public function EditYearlyExpense($id)
    {
        $edit=DB::table('expenses')->where('id',$id)->first();
        return view('edit_yearly_expense')->with('edity',$edit);
    }

    public function UpdateYearlyExpense(Request $request,$id)
    {
        $data=array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['date']=$request->date;
        $data['month']=$request->month;
        $data['year']=$request->year;

        $update=DB::table('expenses')->update($data);
        if($update){
            $notification=array(
                'messege'=>'Successfully Update Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('yearly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function DeleteYearlyExpense($id)
    {
        $delete=DB::table('expenses')->where('id',$id)->delete();
        if($delete){
            $notification=array(
                'messege'=>'Successfully Delete Expense',
                'alert-type'=>'success'
                );
            return Redirect()->route('yearly.expense')->with($notification);  
        }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

///////////////////////////////////////////////

    public function january()
    {
    	$month=date("January");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function february()
    {
    	$month=date("February");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function march()
    {
    	$month=date("March");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function april()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function may()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function june()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function july()
    {
    	$month="July";
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function august()
    {
    	$month="August";
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function september()
    {
    	$month="September";
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function october()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function november()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }

    public function december()
    {
    	$month=date("April");
    	$month_epxns=DB::table('expenses')->where('month',$month)->get();
    	return view('monthly_exepense')->with('mnt_exp',$month_epxns);
    }
}
