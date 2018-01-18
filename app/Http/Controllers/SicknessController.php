<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sickness;
use App\patient;
use App\Customer;
use App\Equipment;
use App\Allergy;
use Session;



class SicknessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $sickness = Sickness::all();
      // $data = array(
      //   'sickness'=>$sickness
      // );
      $equipment = Equipment::all();
      $allergy = Allergy::all();
      $data = array(
        'sickness'=>$sickness,
        'equipment'=>$equipment,
        'allergy'=>$allergy
      );

    return view ('sickness',$data);
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

           $Patient = new Patient;

           $id_cus= Session::get('customer_id');

           $Patient->gender_Pat = $request->gender;
           $Patient ->name_Pat = $request->Name_pat;
           $Patient->lastname_Pat = $request->Lastname_pat;
           $Patient->nickname_Pat = $request->Nickname_pat;
           $Patient->nationality_Pat = $request->Nationality;
           $Patient->race_Pat = $request->Race;
           $Patient->religion_Pat = $request->Religion;
           $Patient->id_card_Pat = $request->ID_Card_pat;
           $Patient->birthday_Pat = $request->Birthday;
           $Patient->weight_Pat = $request->Weight;
           $Patient->hight_Pat = $request->Hight;
           $Patient->interesting_Pat = $request->interesting;
           $Patient->id_customer = $id_cus;

           $Patient->save();
           Session::put('id_patient',$Patient->id);


           return redirect('sickness');

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
