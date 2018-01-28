<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Pat_sick;
use App\sickness;
use App\Equipment;
use App\Pat_Equipment;
use App\Allergy;
Use App\Pat_Allergy;




class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $Patient = Patient::all();
      // $keep = array(
      //   'Patient'=>$Patient
      // );
      //   //
      //   return view('detail',$keep);
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

        if($id !== ''){

          $keeppat = Patient::Where('id_patients',$id)->get();
//dd($keeppat);

          $keep_patsick = Pat_sick::Where('id_patients',$id)
                ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                ->get();

          $keep_equpment = Pat_Equipment::Where('id_patients',$id)
                ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                ->get();


          $keep_allergy = Pat_Allergy::Where('id_patients',$id)
                ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                ->get();
//dd($keep_patsick);
           // $keep_patsick = DB:: table('pat_sicks')->select('pat_sicks.id_sickness,pat_sicks.id_patients,sicknesses.id_sickness,sicknesses.sick_name,sicknesses.sick_description FROM pat_sicks INNER JOIN sicknesses ON pat_sicks.id_sickness=sicknesses.id_sickness WHERE`id_patients`=8');
          //dd($keep_patsick);



          //dd($Patient);

          $data = array(
            'detail'=>$keeppat,
            'show_patsick'=>$keep_patsick,
            'show_equpment'=>$keep_equpment,
            'show_allergy'=>$keep_allergy
          );
        //  dd($data);

        }
          return view('detail',$data);
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
