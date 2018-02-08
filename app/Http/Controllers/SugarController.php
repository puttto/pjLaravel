<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measure_suger;
use Session;

class SugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sugar');
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
        'sugar_lv'=> 'required',
        'comment'=> 'max:200',
      ]);

      $id_care=Session::get('addplan_care');
      $id_patient=Session::get('addplan_patient');

    //$heart_rate = round($request->heart_rate,0);
    //dd($heart_rate);
   $sugar = new Measure_suger;

      //$Customer ->name_cus = $request->Name.$request->Lastname;
      $sugar ->date_time = $request->date;
      $sugar->sugar_lv = $request->sugar_lv;
      $sugar->comment = $request->comment;
      $sugar->id_caregivers = $id_care;
      $sugar->id_patients = $id_patient;
//dd($id_care);
      $sugar->save();

      Session::flash('message', "เพิ่มข้อมูลเรียบร้อย");
      return redirect('addactivity');
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
