<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\emergency;
use App\Caregiver;
use App\Patient;
use App\customer;


class CallEmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $emergency = emergency::take(100)
      // where('emergencies.id_emergencies','>',0)
        ->join('caregivers','emergencies.id_caregivers','=','caregivers.id_caregivers')
        ->join('patients','emergencies.id_patients','=','patients.id_patients')
        ->join('customers','patients.id_customer','=','customers.id_customer')
        ->select('id_emergencies','message','emergencies.status','date_time','caregivers.id_caregivers','name_care','lastname_care','mobilephone_care','patients.id_patients','name_Pat','lastname_Pat','customers.id_customer','name_cus','lastname_cus','mobilephone_cus')
        ->orderBy('id_emergencies', 'desc')
        ->get();

        $data = array('emergency'=>$emergency);

        //
        return view('callemergency',$data);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
      $updateemer = emergency::where('id_emergencies',$id)
                    ->update(['emergencies.status'=>$request->new_status]);

                  return  redirect('callemergency');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $status_comp= emergency::where('status','=','call')
             ->update(['status'=>'complete']);
             return redirect('/callemergency');
    }
}
