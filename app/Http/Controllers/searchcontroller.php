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
    {   $idpatient =  Session::get('id_patient');
//loop iddata ตยs ickness ลง db

    $iddata = $request->iddata;
     $point = $request->point;
    // dd($pp);
    $sendiddate = explode(',', $iddata);
    $sendpoint = explode(',', $point);


    $care_point =  Session::get('care_point');

    // foreach ($care_point as $key => $id_care_point) {
    //    $sendpoint = explode(',', $id_care_point);
    //    // array_push($test,$sendpoint);
    // }
    // array_push($test,$sendpoint);
    // dd($test);
    //
     // dd($test);

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

      $patsickavg = Pat_sick::Where([['id_patients', '=', $id]])
                 ->join('match_sicks', 'pat_sicks.id_sickness', '=', 'match_sicks.id_sickness')
                 ->get();
       $pat_equipmentavg = Pat_Equipment::Where('id_patients','=',$id)
                ->join('match_equipments', 'pat__equipments.id_equipment', '=', 'match_equipments.id_equipment')
       ->get();

                  $max = 0;

                 foreach ($patsickavg as $countmaxpat) {
                   $max++;
                 }
                 foreach ($pat_equipmentavg as $countmaxequ) {
                   $max++;
                 }
// dd($max);


      $patient =  Patient::Where('id_patients','=',$id)->get();


        $caregiver = caregiver::Where('caregiver_status','=','not_work')
        // ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
        // ->join('caregiver_skills', 'caregivers.id_caregivers', '=', 'caregiver_skills.id_caregivers')
        // ->join('caregiver__equipments','caregivers.id_caregivers','=','caregiver__equipments.id_caregivers')
        ->get();
         // dd($caregiver);
//
        $datapat_sick = Pat_sick::Where('id_patients','=',$id)->get();
        $datapat_equipment = Pat_Equipment::Where('id_patients','=',$id)->get();

        $datacaregiver = array();
        $datapoint = array();

        foreach ($caregiver as $getcare) {
          // $getcare['id_caregivers'];
          // dd($getcare);
          //$j=0;
          $datapoint[$getcare['id_caregivers']]=0;

          $specal_skill = Caregiver_skill::Where('id_caregivers','=', $getcare['id_caregivers'])->get();
          // dd($specal_skill);
          foreach ($specal_skill as $getskill) {
              //array_push($datacaregiver,$getskill['id_special_skills'].','.$getcare['id_caregivers']);
// dd($datacaregiver);
            //array_push($datacaregiver,$getskill['id_special_skills'].','.$getcare['id_caregivers']); //loop หาskill ของ care
            foreach ($datapat_sick as $getpat_sick) {
              // dd($getpat_sick);

              Session::put('id_patient',$getpat_sick->id_patients);
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
         // dd($datapoint);

            $id_care = array();
            $data_point =array();
            $data_detail =array();
              $data_skill = array();
              $data_equ = array();
            // $arr = array();


          foreach ($datapoint as $id_caregiver => $value) {

            array_push($id_care,$value.','.$id_caregiver);

          rsort($id_care);
          // dd($id_care);
          Session::put('care_point',$id_care);





           $getcaregiver_point  = caregiver::Where('caregivers.id_caregivers','=',$id_caregiver)
                  ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
                   // ->join('caregiver_skills','caregiver_skills.id_caregivers','=','caregivers.id_caregivers')
                   // ->join('special__skills','caregiver_skills.id_special_skills','=','special__skills.id_special_skills')
                   // ->join('caregiver__equipments','caregiver__equipments.id_caregivers','=','caregivers.id_caregivers')
                   // ->join('medical_equipments','caregiver__equipments.id_medical_equipments','=','medical_equipments.id_medical_equipments')

                   ->get();
            foreach ($getcaregiver_point as $datacare ) {


                $datacare['point']=$value;
                // rsort($data_point['point']);
                if ($value>0) {
                array_push($data_point,$datacare);

// $a=$data_point['point'];

                }
              elseif ($value=='') {
                  array_push($data_point,$datacare);
              }
// dd($datacare);
                $getcaregiverskill  = Caregiver_skill::Where('caregiver_skills.id_caregivers','=',$id_caregiver)
                            ->join('special__skills','caregiver_skills.id_special_skills','=','special__skills.id_special_skills')
                            ->get();
                            foreach ($getcaregiverskill as $dataskill ) {

                                array_push($data_skill,$dataskill);

                                }
                $getcaregiverequ  = Caregiver_Equipment::Where('caregiver__equipments.id_caregivers','=',$id_caregiver)
                                ->join('medical_equipments','caregiver__equipments.id_medical_equipments','=','medical_equipments.id_medical_equipments')

                                    ->get();
                                    foreach ($getcaregiverequ as $dataequ ) {

                                                array_push($data_equ,$dataequ);
                                                }
                }



 $datacare['point'] = ($datacare['point']/$max)*100;
// array_push(,);
           }
// dd($data_point);
          $data_point = array_reverse(array_sort($data_point, function ($value) {

            return $value['point'];

          }));
// dd($data_point);



//           $care_point = array();
//           foreach ($data_point as $getpoint) {
//             // foreach ($value as $getpoint) {
//              $carepoint =$getpoint['point'];
//              array_push($care_point,$carepoint);
//
//             // }
//           }
// dd($id_care);
            // array_multisort($data_point['point']);
             // dd($data_point);
            // rsort($data_point,intval('point'));
          // dd($data_skill);
           // dd($data_skill);

          // $data = array('caregiverdata'=>$getcaregiver);
        // dd($test);
        // foreach ($id_care as $push) {
        //
        // array_push($arr,$push);
        //
        // }

// dd($arr);


  // dd(explode('17', $a));

  // foreach ($id_care as $data ) {
  //
  //
  //
  //
  //         $getcaregiver  = caregiver::Where('caregivers.id_caregivers','=',$data)
  //         ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
  //         ->join('caregiver_skills','caregiver_skills.id_caregivers','=','caregivers.id_caregivers')
  //         ->join('special__skills','caregiver_skills.id_special_skills','=','special__skills.id_special_skills')
  //         ->join('caregiver__equipments','caregiver__equipments.id_caregivers','=','caregivers.id_caregivers')
  //         ->join('medical_equipments','caregiver__equipments.id_medical_equipments','=','medical_equipments.id_medical_equipments')
  //         ->get();
  // }
  // dd($getcaregiver);




// dd($datacaregiver);


      //  if ($id !== '') {
            //dd($id); //ต้องใส่มีstatus ที่ว่างอยู่ด้วยของ caregiver
        //    $patsick = Pat_sick::Where([['id_patients', '=', $id],['caregiver_status','=','not_work']])
            // ->orWhere('status','=','wait')
                  // ->join('match_sicks', 'pat_sicks.id_sickness', '=', 'match_sicks.id_sickness')
                  // ->join('caregiver_skills', 'match_sicks.id_special_skills', '=', 'caregiver_skills.id_special_skills')
                  // ->join('caregivers', 'caregiver_skills.id_caregivers', '=', 'caregivers.id_caregivers')
                  // ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
                  // ->get();
              //dd($patsick);

            // select * from `pat_sicks` inner join `match_sicks` on `pat_sicks`.`id_sickness` = `match_sicks`.`id_sickness` inner join `caregiver_skills` on `match_sicks`.`id_special_skills` = `caregiver_skills`.`id_special_skills` inner join `caregivers` on `caregiver_skills`.`id_caregivers` = `caregivers`.`id_caregivers` where `id_patients` = 2

            // select * from `pat_sicks` inner join `match_sicks` on `pat_sicks`.`id_sickness` = `match_sicks`.`id_sickness` inner join `caregiver_skills` on `match_sicks`.`id_special_skills` = `caregiver_skills`.`id_special_skills` inner join `caregivers` on `caregiver_skills`.`id_caregivers` = `caregivers`.`id_caregivers` where `id_patients` = 10 group by `caregiver_skills`.`id_caregivers`
// foreach ($patsick as $idpatient) {
//         Session::put('id_patient',$idpatient->id_patients);
// }
//
//
//             $data = array('caregiverdata'=>$getcaregiver);
            //dd($data);

//       foreach ($patsick as $patsickdata ) {
// dd($patsickdata);
//         $matchsick = match_sick:: Where('id_sickness',$patsickdata['id_sickness'])->get();
// //dd($matchsick);
//         foreach ($matchsick as $matchsickdata) {
//           $caregiver_skill= Caregiver_skill:: Where('id_special_skills',$matchsick['id_special_skills'])->get();
//             foreach ($caregiver_skill as $caregiver_skilldata) {
//               $caregiver = Caregiver:: Where('id_caregivers',$caregiver_skill['id_caregivers']);
//
// $data = array('caregiverdata'=>$caregiver);
//             }
//         }
//

//       }
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
