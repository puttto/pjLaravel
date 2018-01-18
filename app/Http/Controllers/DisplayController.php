<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Customer;

use App\match_sick;
use App\Caregiver_skill;
use App\Caregiver;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Patient = Patient::all();
        //dd($Patient);
        // //$Customer= patient
        // $id_get = '';
        // foreach ($Patient as $id) {
        //     $id_get=$id['id_patients'];
        // }
        // $Patient= Patient::where('id', $id_get)->get();
        $data = array('display'=>$Patient);


        return view('display', $data);
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
        // //$match_sick = new match_sick;
        // //$match_sick->id_sickness = $request->sickness;
        // $match_sick= match_sick::where('id_sickness', $request->sickness)->get();
        // $id_get = '';
        // foreach ($match_sick as $data) {
        //     $id_get=$data['id_special__skills'];
        // }
        //
        // $caregiver_skill= Caregiver_skill::where('id_special__skills', $id_get)->get();
        // //$data = array('skil'=>$caregiver_skill);
        //
        // $id_get_caregiver = '';
        // foreach ($caregiver_skill as $data) {
        //     $id_get_caregiver=$data['id_caregivers'];
        // }
        //
        // $caregiver = Caregiver::where('id_caregivers', $id_get_caregiver)->get();
        // // $id_get_name = '';
        // // foreach ($caregiver as $data) {
        // //    $id_get_name=$data['name_care'];
        // // }
        // $data = array('Display'=>$caregiver);
        //
        //
        // return view('display', $data);

        //


        //$match_sick = new match_sick;
        //$match_sick->id_sickness = $request->sickness;
        $match_sick= match_sick::where('id_sickness', $request->sickness)->get();
        $id_get = '';
        foreach ($match_sick as $data) {
            $id_get=$data['id_special__skills'];
        }

        $caregiver_skill= Caregiver_skill::where('id_special__skills', $id_get)
                                            ->join('caregivers', 'caregiver_skills.id_caregivers', '=', 'caregivers.id_caregivers')
                                            ->select('caregivers.*')
                                            ->get();
        //$data = array('skil'=>$caregiver_skill);

        // $id_get_caregiver = '';
        // foreach ($caregiver_skill as $data) {
        //     $id_get_caregiver=$data['id_caregivers'];
        // }

        //$caregiver = Caregiver::where('id_caregivers', $id_get_caregiver)->get();
        // $id_get_name = '';
        // foreach ($caregiver as $data) {
        //    $id_get_name=$data['name_care'];
        // }
        $data = array('Display'=>$caregiver_skill);


        return view('display', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //dd($id);
        // if($id !== ''){
        //   $Patient = Patient::find($id);
          //dd();
        //}

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
