<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\suction;
use Session;

class SuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('suction');
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
      $this->validate($request,[
        'date'=> 'required',
        'vol'=> 'required',
        'color'=> 'required',
        'spo2'=>'required',
        //'comment'=> 'max:200',
      ]);

      $id_care=Session::get('id_care_sess_care');
      $id_patient=Session::get('id_pat_sess_care');

    //$heart_rate = round($request->heart_rate,0);
    //dd($heart_rate);
      $suction = new suction;

      //$Customer ->name_cus = $request->Name.$request->Lastname;
      $suction ->date_time = $request->date;
      $suction->vol = $request->vol;
      $suction->color = $request->color;
      $suction->spo2 = $request->spo2;
      //$suction->comment = $request->comment;
      $suction->id_caregivers = $id_care;
      $suction->id_patients = $id_patient;
  //dd($id_care);
      $suction->save();

      Session::flash('message', "เพิ่มข้อมูลเรียบร้อย");
      return redirect('authcare/addactivity');
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
