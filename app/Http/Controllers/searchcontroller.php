<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
use App\match_sick;
use App\Match_equipment;
use App\Caregiver_skill;
use App\Caregiver;
use App\Caregiver_Detail;
use App\Caregiver_Equipment;
use App\Select_care_status;
use Session;

class searchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $idpatient =  Session::get('id_patient');
        //loop iddata ตยs ickness ลง db

        $iddata = $request->iddata;
        $point = $request->point;
        // dd($pp);
        $sendiddate = explode(',', $iddata);
        $sendpoint = explode(',', $point);


        $care_point =  Session::get('care_point');

        for ($i=0; $i < count($sendiddate) ; $i++) {
            //dd(count($iddata));
            $Select = new Select_care_status;
            $Select->id_patients = $idpatient;
            $Select->id_caregivers = $sendiddate[$i];
            ////ใส่ตัวแปลหลังลูป
      $Select->status_care='ad_select'; //แก้ status
      // dd($request->point);
      $Select->point = $sendpoint[$i];

            $Select->save();
        }

        $waitpatient = Patient::Where([['id_patients','=',$idpatient],['status','=','request']])
     ->update(['status'=>'wait']);
        $waitstatus_sick = Pat_sick::Where([['id_patients','=',$idpatient],['status','=','request']])
     ->update(['status'=>'wait']); //
        $waitstatus_equip = Pat_Equipment::Where([['id_patients','=',$idpatient],['status','=','request']])
     ->update(['status'=>'wait']);
        $waitstatus_allergy = Pat_Allergy::Where([['id_patients','=',$idpatient],['status','=','request']])
     ->update(['status'=>'wait']);



        return redirect('dash');
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
        $patsickavg = Pat_sick::Where([['id_patients', '=', $id],['status','=','request']])
                 ->join('match_sicks', 'pat_sicks.id_sickness', '=', 'match_sicks.id_sickness')
                 ->get();
        // dd($patsickavg);
        $pat_equipmentavg = Pat_Equipment::Where([['id_patients', '=', $id],['status','=','request']])
                ->join('match_equipments', 'pat__equipments.id_equipment', '=', 'match_equipments.id_equipment')
                ->get();
        // dd($pat_equipmentavg);


        $max=0;
        foreach ($patsickavg as $countmaxpat) {
            $max++;
            // dd($max);
// dd($countmaxpat);
        }

        foreach ($pat_equipmentavg as $countmaxequ) {
            $max++;
            // dd($max);
        }

        // dd($max);



        $patient =  Patient::Where([['id_patients', '=', $id],['status','=','request']])->get();
        foreach ($patient as $getdatapat) {
            # code...
        }

        // dd($getdatapat);


        $caregiver = caregiver::Where('caregiver_status', '=', 'not_work')
        // ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
        // ->join('caregiver_skills', 'caregivers.id_caregivers', '=', 'caregiver_skills.id_caregivers')
        // ->join('caregiver__equipments','caregivers.id_caregivers','=','caregiver__equipments.id_caregivers')
        ->get();
        // dd($caregiver);
//
        $datapat_sick = Pat_sick::Where([['id_patients', '=', $id],['status','=','request']])->get();
        $datapat_equipment = Pat_Equipment::Where([['id_patients', '=', $id],['status','=','request']])->get();

        $datacaregiver = array();
        $datapoint = array();
        $datemax =array();

        foreach ($caregiver as $getcare) {
            // $getcare['id_caregivers'];
            // dd($getcare);
            //$j=0;

            $datapoint[$getcare['id_caregivers']]=0;


            $specal_skill = Caregiver_skill::Where('id_caregivers', '=', $getcare['id_caregivers'])->get();
            // dd($specal_skill);
            foreach ($specal_skill as $getskill) {
                //array_push($datacaregiver,$getskill['id_special_skills'].','.$getcare['id_caregivers']);
                // dd($datacaregiver);
                //array_push($datacaregiver,$getskill['id_special_skills'].','.$getcare['id_caregivers']); //loop หาskill ของ care
                foreach ($datapat_sick as $getpat_sick) {
                    // dd($getpat_sick);

                    Session::put('id_patient', $getpat_sick->id_patients);
                    // dd($getpat_sick);
                    $matchsick = match_sick::Where([['match_sicks.id_sickness', '=', $getpat_sick['id_sickness']],['match_sicks.id_special_skills','=',$getskill['id_special_skills']]])
                      ->get();

                    foreach ($matchsick as $getmathsick) {
                        // เทียบ matchsick
                        $datapoint[$getcare['id_caregivers']]++;
                    }
                }
                foreach ($datapat_equipment as $getpat_equip) {
                    $matchequipment = Match_equipment::Where([['match_equipments.id_equipment', '=', $getpat_equip['id_equipment']],['match_equipments.id_special_skills','=',$getskill['id_special_skills']]])
              ->get();

                    foreach ($matchequipment as $getmathequip) {
                        $datapoint[$getcare['id_caregivers']]++;

                        // dd($getmathequip);
                    }
                }
            }


            // array_push($datacaregiver,$getcare['id_special_skills'].','.$getcare['id_caregivers']);
        // array_push($datacaregiver,$getcare['id_caregivers']);
        }


        $id_care = array();
        $data_point =array();
        $data_detail =array();
        $data_skill = array();
        $data_equ = array();
        // $arr = array();
        $test=0;
        // dd($datapoint);

        foreach ($datapoint as $id_caregiver => $value) {
            array_push($id_care, $value.','.$id_caregiver);

            rsort($id_care);
            // dd($id_care);

            // Session::put('care_point', $id_care);

            $getcaregiver_point  = caregiver::Where('caregivers.id_caregivers', '=', $id_caregiver)
                  ->join('caregiver__details', 'caregivers.id_caregivers', '=', 'caregiver__details.id_caregivers')
                   ->get();
            // dd($getdatapat);

            foreach ($getcaregiver_point as $datacare) {

              // dd($datacare);
                $datacare['point']=$value;
                // $test++;
                $w_h = 0;
                $sum = 0;
                $edu = 0;
                $exp = 0;
                if ($datacare['weight_care']<=80) {
                    if ($datacare['weight_care']+5>=$getdatapat['weight_Pat'] && $datacare['weight_care']<=$getdatapat['weight_Pat']+10) {
                        $w_h+=5;
                        $sum += 1;
                        // $max+=1;
                      // $datacare['point']+=5;
                    }
                    if ($datacare['hight_care']>=$getdatapat['hight_Pat']-5 && $datacare['hight_care']<=$getdatapat['hight_Pat']+20) {
                        $w_h+=3;
                        // $max+=1;
                        // $datacare['point']+=3;
                        $sum += 1;
                    }
                }
                if ($datacare['edu_caregiver']==1) {
                  $edu=1;
                  $sum += 1;
                }elseif ($datacare['edu_caregiver']==2) {
                  $edu=2;
                  $sum += 1;
                }
                elseif ($datacare['edu_caregiver']==3) {
                  $edu=3;
                  $sum += 1;
                }
                elseif ($datacare['edu_caregiver']==4) {
                  $edu=4;
                  $sum += 1;
                }

                if ($datacare['year_of_caregiver']>=1 && $datacare['year_of_caregiver']<=3) {
                  $exp =1;
                  $sum += 1;
                }elseif($datacare['year_of_caregiver']>=4 && $datacare['year_of_caregiver']<=6) {
                  $exp =2;
                  $sum += 1;
                }elseif($datacare['year_of_caregiver']>=7 && $datacare['year_of_caregiver']<=9) {
                  $exp =3;
                  $sum += 1;
                }elseif($datacare['year_of_caregiver']>=10 && $datacare['year_of_caregiver']<=12) {
                  $exp =4;
                  $sum += 1;
                }elseif($datacare['year_of_caregiver']>=13 ) {
                  $exp =5;
                  $sum += 1;
                }




                // rsort($data_point['point']);
                if ($value>0) {
                    array_push($data_point, $datacare);
                }
                // if ($value=='') {
                //
                // array_push($data_point, $datacare);
                // }
                // dd($datacare);
                $getcaregiverskill  = Caregiver_skill::Where('caregiver_skills.id_caregivers', '=', $id_caregiver)
                            ->join('special__skills', 'caregiver_skills.id_special_skills', '=', 'special__skills.id_special_skills')
                            ->get();
                foreach ($getcaregiverskill as $dataskill) {
                    array_push($data_skill, $dataskill);
                }
                $getcaregiverequ  = Caregiver_Equipment::Where('caregiver__equipments.id_caregivers', '=', $id_caregiver)
                                ->join('medical_equipments', 'caregiver__equipments.id_medical_equipments', '=', 'medical_equipments.id_medical_equipments')

                                    ->get();
                foreach ($getcaregiverequ as $dataequ) {
                    array_push($data_equ, $dataequ);
                }
            }


            $oldpoint = 0;
            if ($max!=0 && $w_h!=0 ) {
                $oldpoint = ($datacare['point']/$max)*100;//5
                // dd($oldpoint); //20
                // dd($max);  /5
                // dd($w_h);//3
                // dd($sum); //1
                $datacare['point'] =((($oldpoint)*$sum)+$w_h+$exp+$edu)/($sum+1);
            } else {
                $oldpoint = ($datacare['point']/$max)*100;
                $datacare['point'] =((($oldpoint)*$sum)+$exp+$edu)/($sum+1);
            }
        }




        $data_point = array_reverse(array_sort($data_point, function ($value) {
            return $value['point'];
        }));
        // dd($data_point);




        $data = array('caregiverdata'=>$data_point,
                      'careskill'=>$data_skill,
                      'careequip'=>$data_equ,
                      'patient'=>$patient

      );
        return view('search', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  //dd($id);
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
        dd($id);
        redirect('search');
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
