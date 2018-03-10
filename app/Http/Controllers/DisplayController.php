<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Customer;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;

use App\match_sick;
use App\Caregiver_skill;
use App\Caregiver;
use Carbon\Carbon;

class DisplayController extends Controller
{/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Patient = Patient::all();
         $Patient = Patient::where('patients.status','=','request')
        // ->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
        // ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
        // ->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
        // ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
        // ->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
        // ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
         // ->groupBy('pat_sicks.id_patients')
         ->orderBy('patients.id_patients', 'desc')
         ->get();
// dd($Patient);

          $data_pat = array();
          $data_pat_sick = array();
          $data_pat_equpment = array();
          $data_pat_allergy = array();

         // $Patientid = Patient::where('patients.status','=','request')->select('id_patients')->orderBy('patients.id_patients', 'desc')->get();
         // foreach ($Patientid as $getidpat) {
         //      $idpat = $getidpat['id_patients'];
         //
         // }
 // dd($idpat);
         foreach ($Patient as $datapat) {
           array_push($data_pat,$datapat);

           foreach ($data_pat as $getidpat) {
               $idpat = $getidpat['id_patients'];
           }

// dd($data_pat);
         $keep_patsick = Pat_sick::Where([['patients.status','=','request'],['pat_sicks.id_patients',$idpat],['pat_sicks.status','=','request']])
               ->join('patients','pat_sicks.id_patients','=','patients.id_patients')
               //->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
               ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
               ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
               ->get();
               foreach ($keep_patsick as $datapatsick ) {

                   array_push($data_pat_sick,$datapatsick);

                   }

         $keep_equpment = Pat_Equipment::Where([['patients.status','=','request'],['pat__equipments.id_patients',$idpat],['pat__equipments.status','=','request']])
                ->join('patients','pat__equipments.id_patients','=','patients.id_patients')
               //->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
               ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
               ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
               ->get();
               foreach ($keep_equpment as $datapatequpment ) {

                   array_push($data_pat_equpment,$datapatequpment);

                   }

         $keep_allergy = Pat_Allergy::Where([['patients.status','=','request'],['pat__allergies.id_patients',$idpat],['pat__allergies.status','=','request']])
                ->join('patients','pat__allergies.id_patients','=','patients.id_patients')
               //->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
               ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
               ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
               ->get();
               foreach ($keep_allergy as $datapatallergy ) {

                   array_push($data_pat_allergy,$datapatallergy);

                   }
             }

                      //  $show = [Carbon::parse($get_age)->diff(Carbon::now()) ->format('%y ปี')];

        $data = array(
                      'display'=>$data_pat,
                      'patsick'=>$data_pat_sick,
                      'equpment'=>$data_pat_equpment,
                      'allergy'=>$data_pat_allergy,

      );
 // dd($data);
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
      // $Patient = Patient::all();
      //
      // $data = array('display'=>$Patient);
      //
      //
      // return view('dash', $data);
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
