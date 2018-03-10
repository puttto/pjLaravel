<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caregiver;
use App\patient;
use App\customer;
// use App\Select_care_status;
use App\emergency;
use Session;
use Carbon\Carbon;

class EmergencyController extends Controller
{/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth.caregiver');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id_care=Session::get('id_care_sess_care');
       $id_patient=Session::get('id_pat_sess_care');

 // $id_patient='';

if ($id_patient=='') {

 $id_patient=0;
 // dd($id_patient);

}


      $findidcus = patient::where('id_patients',$id_patient)->select('id_customer')->get();
        // dd($findidcus);

// $findidcus='';
       if ($findidcus=='') {
        $id_cus=0;
        // dd($id_cus);
       }else {
         $id_cus='';
         foreach ($findidcus as $getid) {
         $id_cus =  $getid['id_customer'];
                }
            }

       Session::put('id_cus_sess_care',$id_cus);


      $get_customer = customer::where('id_customer',$id_cus)->get();
       // dd($get_customer);

         $data = array('customer'=>$get_customer);

        // dd($data);
        return view('emergency',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id_care=Session::get('id_care_sess_care');
       $id_patient=Session::get('id_pat_sess_care');

      $date_time = Carbon::now();
      $emergency = new emergency;
      $emergency ->date_time = $date_time;
      $emergency->message = $request->message;
      $emergency->status = 'call';
      $emergency->id_caregivers = $id_care;
      $emergency->id_patients = $id_patient;
      $emergency->save();

      return redirect('authcare/emergency');



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
