<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plan;
use App\plan_detail;
use App\patient;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
use App\Caregiver;
use App\Select_care_status;
use Session;

class AddplanController extends Controller
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

          $id_c = Session::get('id_care_sess_care');

          $id_p = Session::get('id_pat_sess_care');

          $patient = Patient::where('id_patients','=',$id_p)->get();


          $keep_patsick = Pat_sick::Where([['patients.id_patients',$id_p],['pat_sicks.status','=','complete']])
                ->orWhere([['patients.id_patients',$id_p],['pat_sicks.status','=','wait']])
                ->orWhere([['patients.id_patients',$id_p],['pat_sicks.status','=','request']])
                ->join('patients','pat_sicks.id_patients','=','patients.id_patients')
                //->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
                ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                ->get();

          $keep_equpment = Pat_Equipment::Where([['patients.id_patients',$id_p],['pat__equipments.status','=','complete']])
                ->orWhere([['patients.id_patients',$id_p],['pat__equipments.status','=','wait']])
                ->orWhere([['patients.id_patients',$id_p],['pat__equipments.status','=','request']])
                ->join('patients','pat__equipments.id_patients','=','patients.id_patients')
                //->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
                ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                ->get();


          $keep_allergy = Pat_Allergy::Where([['patients.id_patients',$id_p],['pat__allergies.status','=','complete']])
                ->orWhere([['patients.id_patients',$id_p],['pat__allergies.status','=','wait']])
                ->orWhere([['patients.id_patients',$id_p],['pat__allergies.status','=','request']])
                ->join('patients','pat__allergies.id_patients','=','patients.id_patients')
                //->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
                ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                ->get();

 // dd($id_p);

      $selectplan= Plan::where([['plans.id_patients',$id_p],['plans.id_caregivers',$id_c],['status_plan','=','use']])
      // ,['pat_sicks.status','=','complete']
            ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
            // ->join('pat_sicks','pat_sicks.id_patients','=','plans.id_patients')
            // ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
            ->get();
// dd($selectplan);
$selectplan_do= Plan::where([['plans.id_patients',$id_p],['plans.id_caregivers',$id_c],['status_plan','=','use']])
      ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
      ->select('doing')

      ->get();
      // dd($selectplan_do);
$hasdata=0;
    foreach ($selectplan_do as $data) {

      if (strpos($data['doing'] , 'suction')!== false || strpos($data['doing'] , 'feeding ')!== false ) {
          $hasdata=1;
      }

    }
      // dd($hasdata);





        $data = array('selectplan'=>$selectplan,
        'hasdata'=>$hasdata,
        'patient'=>$patient,
        'patsick'=>$keep_patsick,
        'equpment'=>$keep_equpment,
        'allergy'=>$keep_allergy,

      );

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
      $this->validate($request,[
        'set_date'=> 'required',
      ]);

      $plan = new Plan;


      $id_c = Session::get('id_care_sess_care');
      $id_p = Session::get('id_pat_sess_care');

        $plan->id_patients = $id_p;
        $plan->id_caregivers = $id_c;
        $plan->status_plan = 'use';

        $plan->set_date = $request->set_date;

        $plan->save();

        $selectplan = plan::all();
            //dd($selectplan);
            foreach ($selectplan as $data) {
              $id_plan = $data['id_plans'];
            }

        $plandetail = new Plan_detail;

        $plandetail->doing = $request->doing;
        $plandetail->id_plans=$id_plan;
        if ($request->has_time=='ไม่มีช่วงเวลา') {

          $plandetail->time = $request->has_time;
          //
        }
        else if ($request->when_time_allday == 'ตลอดทั้งวัน ทุกๆ :' ) {
            $plandetail->time = $request->when_time_allday.$request->time."ชั่วโมง";
        }else {
          //$plandetail->time .= $request->when_time;
          if ($request->has_time=='มีช่วงเวลา') {

          if ($request->when_time_mor != '') {
            $plandetail->time .= $request->when_time_mor.',';
          }
           if ($request->when_time_noon != '') {
            $plandetail->time .= $request->when_time_noon.',';
          }
           if ($request->when_time_eve != '') {
            $plandetail->time .= $request->when_time_eve.',';
          }
           if ($request->when_time_night != '') {
            $plandetail->time .= $request->when_time_night.',';
          }

        }
        }



        $plandetail->save();
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
