<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\feeding;
use Session;

class FeedingController extends Controller
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
        return view('feeding');
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
    {  $this->validate($request,[
        'date'=>'required',
        'type_food'=>'required',
        'vol'=> 'required',
        'water'=> 'required',

        //'comment'=> 'max:200',
      ]);

      $id_care=Session::get('id_care_sess_care');
      $id_patient=Session::get('id_pat_sess_care');

    //$heart_rate = round($request->heart_rate,0);
    //dd($heart_rate);
      $feeding = new feeding;

      //$Customer ->name_cus = $request->Name.$request->Lastname;
      $feeding ->date_time = $request->date;
      $feeding->type_food = $request->type_food;
      $feeding->vol = $request->vol;
      $feeding->water = $request->water;

      //$suction->comment = $request->comment;
      $feeding->id_caregivers = $id_care;
      $feeding->id_patients = $id_patient;
//dd($id_care);
      $feeding->save();

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
