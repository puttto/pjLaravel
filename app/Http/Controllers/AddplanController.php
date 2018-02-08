<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Session;

class AddplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// Session::put('id_select_care_statuses',$id);
// Session::get('id_select_care_statuses');
          $id_c = 10;
          $id_p = 19;

          Session::put('addplan_care',$id_c);
          Session::put('addplan_patient',$id_p);


      $selectplan= Plan::where([['id_patients',$id_p],['id_caregivers',$id_c],['status_plan','=','use']])
            ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
            ->get();

        $data = array('selectplan'=>$selectplan);

      return view('addactivity',$data);
        //
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
