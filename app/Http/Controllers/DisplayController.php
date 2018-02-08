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
        //$Patient = Patient::all();
        $Patient = Patient::where('status','=','request')->get();


      //  dd($Patient);
        // //$Customer= patient
        // $id_get = '';
        // foreach ($Patient as $id) {
        //     $id_get=$id['id_patients'];
        // }
        // $Patient= Patient::where('id', $id_get)->get();
        $data = array('display'=>$Patient);


        return view('dash', $data);
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
      $Patient = Patient::all();

      $data = array('display'=>$Patient);


      return view('dash', $data);
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
