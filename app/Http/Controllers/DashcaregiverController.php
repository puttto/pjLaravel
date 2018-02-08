<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caregiver;
use App\patient;
use App\plan;

use App\urinate;
use App\feces;
use App\suction;
use App\Vital_sign;
use App\Measure_suger;
use App\feeding;

use Session;


class DashcaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id_pat = 19;
      $id_care = 10;

      $showvital = Vital_sign::where([['id_patients',$id_pat],['id_caregivers',$id_care]])
            //->join('measure_sugers', 'measure_sugers.id_measure_sugers')
            ->get();
      $showsuction = suction::where([['id_patients',$id_pat],['id_caregivers',$id_care]])
      ->get();
      $showsugar = Measure_suger::where([['id_patients',$id_pat],['id_caregivers',$id_care]])
      ->get();
      $showfeeding = feeding::where([['id_patients',$id_pat],['id_caregivers',$id_care]])
      ->get();

            //dd($showactivity);
            $data = array(
              'showvital' => $showvital,
              'showsuction'=>$showsuction,
              'showsugar'=>$showsugar,
              'showfeed'=>$showfeeding,
            );
//dd($data);
        return view('dashcaregiver',$data);
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
