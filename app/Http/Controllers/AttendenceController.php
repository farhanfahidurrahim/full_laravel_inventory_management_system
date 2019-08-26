<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;

class AttendenceController extends Controller
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

    public function TakeAttendence()
    {	
    	$emply=DB::table('employees')->get();
    	return view('take_attendence')->with('emply',$emply);
    }

    public function InsertAttendence(Request $request)
    {
    	$date=$request->att_date;
    	$match=DB::table('attendences')->where('att_date',$date)->first();
    	if ($match) {
    		 $notification=array(
                 'messege'=>'Today Attendence Already Taken!!',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
    	}else{

    		foreach ($request->user_id as $id) {
    		$data[]=[
    			"user_id"=>$id,
    			"attendence"=>$request->attendence[$id],
    			"att_date"=>$request->att_date,
    			"att_year"=>$request->att_year,
    			"att_month"=>$request->att_month,
    			"date"=>date("d_m_y"),
    		];
    	}

    	$in_attnd=DB::table('attendences')->insert($data);
    	if($in_attnd){
    		$notification=array(
    			'messege'=>'Successfully Attendence Insert',
    			'alert-type'=>'success'
    			);
    		return Redirect()->route('take.attendence')->with($notification);  
    	}else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    	}

    	
    }

    public function AllAttendence()
    {	
    	$all_attdnc=DB::table('attendences')->select('date')->groupBy('date')->get();
    	return view('all_attendence')->with('all_attdnc',$all_attdnc);
    }

    public function EditAttendence($date)
    {
    	$edt_att=DB::table('attendences')
    	->join('employees','attendences.user_id','employees.id')
    	->select('employees.name','employees.photo','attendences.*')
    	->where('date',$date)->get();
    	return view('edit_attendence')->with('edt_att',$edt_att);
    }

    public function UpdateAttendence(Request $request)
    ///......using Modal.....///
    {
    	foreach ($request->id as $id) {
    		$data=[
    			"attendence"=>$request->attendence[$id],
    			"att_date"=>$request->att_date,
    		];

    		    $up_attnd=Attendence::where(['att_date'=>$request->att_date,'id'=>$id])->first();
    			$up_attnd->update($data);	
    	}

    	//$up_attnd=DB::table('attendences')->update($data);
    	if($up_attnd){
    		$notification=array(
    			'messege'=>'Successfully Attendence Updated',
    			'alert-type'=>'success'
    			);
    		return Redirect()->route('all.attendence')->with($notification);  
    	}else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }
    }

    public function ViewAttendence($date)
    {
      $vdate=Db::table('attendences')->where('date',$date)->first();
      $vw_atnd=DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('employees.name','employees.photo','attendences.*')
        ->where('date',$date)->get();
        return view('view_attendence')->with(['vw_atnd'=>$vw_atnd, 'date'=>$vdate]);
    }

    public function DeleteAttendence($date)
    {
      $dlt_atnd=DB::table('attendences')->where('date',$date)->delete();

      if ($dlt_atnd) {
             $notification=array(
             'messege'=>'Successfully Attendence Deleted ',
             'alert-type'=>'success'
              );
            return Redirect()->route('all.attendence')->with($notification);                      
         }else{
          $notification=array(
             'messege'=>'error ',
             'alert-type'=>'success'
              );
             return Redirect()->back()->with($notification);
         }   
    }
}
