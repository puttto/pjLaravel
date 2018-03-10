<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feces;
use Session;

class ColostomyController extends Controller
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
      return view('colostomy');
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

        //'comment'=> 'max:200',
      ]);

      $id_care=Session::get('id_care_sess_care');
      $id_patient=Session::get('id_pat_sess_care');

    //$heart_rate = round($request->heart_rate,0);
    //dd($heart_rate);
   $feces = new feces;


      $feces ->date_time = $request->date;

      //$feces->comment = $request->comment;
      $feces->id_caregivers = $id_care;
      $feces->id_patients = $id_patient;
//dd($id_care);
      $feces->save();

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
