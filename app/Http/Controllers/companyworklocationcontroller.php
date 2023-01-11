<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companyworklocation;
use App\employees;
use App\configuration;


class companyworklocationcontroller extends Controller
{
   public function index(Request $request)
{ 
	 /*dd($request->RequestType);*/
	/*
   *//* $show2=configuration::select('value')->distinct()->where('type','departments')->get();*/
	$show = companyworklocation::select('country','country_code')->distinct()->get();

	 $show2=configuration::select('value','id')->where('type','departments')->get();
    



    
  
    $show1 = configuration::select('value','id')->distinct()->where('type','employee-type')->get();

  
    return view('create')->with('show2',$show2)->with('show', $show)->with('show1', $show1);

}

 public function date(Request $request)
   {

  $data=$request->all();


// dd($data['startdate']);

// dd($data['enddate']);
// dd(date('d-m-Y', strtotime($data['startdate'])));
  // dd(date('Y-m-d', strtotime($data['startdate'])));
  $Daterange = employees::select('*')->whereBetween('start_date', [date('Y-m-d', strtotime($data['startdate'])),date('Y-m-d', strtotime($data['enddate']))])->get();
// $sales = employees::select('*')->where('start_date','>=', date('d-m-Y', strtotime($data['startdate'])))->where('start_date','<=',date('d-m-Y', strtotime($data['enddate'])))->get();
 
/*$sales = employees::all()->where('start_date','>=', $data['startdate'])->where('start_date','<=',$data['enddate'])->get();*/
     /* dd($sales);*/


return response()->json($Daterange);
/*return view('createsate')->with('sales',$sales);*/
}
  public function selectdropdowndata(Request $request){
 dd( $countrydropdown);
  /*	 $countryselectdropdowndata =new configuration;*/
  	 $countrydropdown=$request->all();
  	
  	  $countrydropdowns = companyworklocation::select('country','country_code')->distinct()->where('id','118');
     /* $countryselectdropdowndata->RequestType=$request->RequestType;*/
   /* $countryDropdowndata=configuration::select('*')->where('type','=','cost-centers')->get();*/
   /*  return view('Dropdowndata');
*/
   return response()->json($countrydropdowns);

  


}


}