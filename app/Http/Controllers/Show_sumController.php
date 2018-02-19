<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
Use App\Patient;
Use App\ Sickness;
use Session;
use Carbon\Carbon;


class Show_sumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id= Session::get('id_patient');
      //dd($id);
      if($id !== ''){
        $keeppat = Patient::Where('id_patients',$id)->get();
        //dd($Patient);
        $keep_patsick =  Pat_sick::Where([['id_patients','=',$id],['status','=','request']])
              ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
              ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
              ->get();


              $keep_equipment = Pat_Equipment::Where([['id_patients','=',$id],['status','=','request']])
                    ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                    ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                    ->get();


              $keep_allergy = Pat_Allergy::Where([['id_patients','=',$id],['status','=','request']])
                    ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                    ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                    ->get();

                $keepage = Patient::Where('id_patients',$id)
                    ->select('birthday_Pat')
                    ->get();

                    $get_age = '';
                    foreach ($keepage as $id) {
                        $get_age = $id['birthday_Pat'];
                    }

                        $age = [Carbon::parse($get_age)->diff(Carbon::now())->format('%y ปี %m เดือน กับอีก %d วัน')];
                        //dd($age);
//dd($keep_patsick);

        $data = array(
          'pat'=>$keeppat,
          'show_patsick'=>$keep_patsick,
            'show_equipment'=>$keep_equipment,
              'show_allergy'=>$keep_allergy,
              'show_age'=>$age



      );
        //dd($data);

      }

        return view('sum',$data);
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

        $id_pat= Session::get('id_patient');
        $sick = $request->sickness;
        for ($i=0; $i < count($sick) ; $i++) {
          # code...
            $sickness = new Pat_sick;
            $sickness->id_patients = $id_pat;
            $sickness->id_sickness = $sick[$i];
            $sickness->status = 'request';
            $sickness->save();
        }//sickness

        // $disa = $request->sickness;
        // for ($i=0; $i < count($disa) ; $i++) {
        //   # code...
        //     $sickness = new Pat_sick;
        //     $sickness->id_patients = $id_pat;
        //     $sickness->id_sickness = $disa[$i];
        //     $sickness->save();
        // }//disabled->sicknesstable

        $equip = $request->equipment;
        for ($i=0; $i < count($equip) ; $i++) {
          # code...
            $equipment = new Pat_Equipment;
            $equipment->id_patients = $id_pat;
            $equipment->id_equipment = $equip[$i];
            $equipment->status = 'request';
            $equipment->save();
        }//equipment

        $aller = $request->allergy;
        for ($i=0; $i < count($aller) ; $i++) {
          # code...
            $allergy = new Pat_Allergy;
            $allergy->id_patients = $id_pat;
            $allergy->id_allergies = $aller[$i];
            $allergy->status = 'request';
            $allergy->save();
        }//allergy

      //   $patient = new Patient;
      // $patient->description_pat = $request->description_pat;
      // $patient->save();


        $id= Session::get('id_patient');
        //dd($id);
        if($id !== ''){
          $keeppat = Patient::Where('id_patients',$id)->get();
          //dd($Patient);
          $keep_patsick = Pat_sick::Where('id_patients',$id)
                ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                ->get();

          $keep_equipment = Pat_Equipment::Where('id_patients',$id)
                ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                ->get();


          $keep_allergy = Pat_Allergy::Where('id_patients',$id)
                ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                ->get();

                $keepage = Patient::Where('id_patients',$id)
                ->select('birthday_Pat')
                ->get();
                $get_age = '';
                foreach ($keepage as $id) {
                    $get_age = $id['birthday_Pat'];
                }
                $age = [Carbon::parse($get_age)->diff(Carbon::now())->format('%y ปี %m เดือน กับอีก %d วัน')];
                //dd($age);
                //dd($keep_patsick);


                $data = array(
                'pat'=>$keeppat,
                'show_patsick'=>$keep_patsick,
                'show_equipment'=>$keep_equipment,
                'show_allergy'=>$keep_allergy,
                'show_age'=>$age


      );
          //dd($data);

        }

        //return redirect('sum');
        return view('sum',$data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $id= Session::get('id_patient');
      //dd($id);
      if($id !== ''){
        $keeppat = Patient::Where('id_patients',$id)->get();

              $keep_patsick = Pat_sick::Where([['id_patients','=',$id],['status','!=','del']])
                    ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                    ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                    ->get();

              $keep_equipment = Pat_Equipment::Where([['id_patients','=',$id],['status','!=','del']])
                    ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                    ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                    ->get();


              $keep_allergy = Pat_Allergy::Where([['id_patients','=',$id],['status','!=','del']])
                    ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                    ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                    ->get();

        $data = array(
          'pat'=>$keeppat,
          'show_patsick'=>$keep_patsick,
          'show_equipment'=>$keep_equipment,
          'show_allergy'=>$keep_allergy
      );
        //dd($data);

      }
        return view('sum',$data);
        //dd();

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
      // if ($id !== '') {
      // //  $patient = new Patient;
      //   $patient = Patient::Where('id_patients',$id)->get();
      //   //dd($patient);
      //   $data = array(
      //     'pat'=>$patient
      //   );
      //   return view('updatepat',$data);
      // }

      //return View::make('updatepat.edit')
            // ->with('updatepat', $patient);

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

//       if ($id !== '') {
//       //$id_pat= Session::get('id_patient');
//       $sick = $request->sickness;
//       for ($i=0; $i < count($sick) ; $i++) {
//         # code...
//           $sickness = new Pat_sick;
//           $sickness->id_patients = $id;
//           $sickness->id_sickness = $sick[$i];
//           $sickness->save();
//       }//sickness
//
//       // $disa = $request->sickness;
//       // for ($i=0; $i < count($disa) ; $i++) {
//       //   # code...
//       //     $sickness = new Pat_sick;
//       //     $sickness->id_patients = $id_pat;
//       //     $sickness->id_sickness = $disa[$i];
//       //     $sickness->save();
//       // }//disabled->sicknesstable
//
//       $equip = $request->equipment;
//       for ($i=0; $i < count($equip) ; $i++) {
//         # code...
//           $equipment = new Pat_Equipment;
//           $equipment->id_patients = $id;
//           $equipment->id_equipment = $equip[$i];
//           $equipment->save();
//       }//equipment
//
//       $aller = $request->allergy;
//       for ($i=0; $i < count($aller) ; $i++) {
//         # code...
//           $allergy = new Pat_Allergy;
//           $allergy->id_patients = $id;
//           $allergy->id_allergies = $aller[$i];
//           $allergy->save();
//       }//allergy
//
//     //  $id= Session::get('id_patient');
//       //dd($id);
//       if($id !== ''){
//         $keeppat = Patient::Where('id_patients',$id)->get();
//         //dd($Patient);
//
//         $data = array('pat'=>$keeppat);
//         //dd($data);
//
//       }
// }
//       //return redirect('sum');
//     return view('sum',$data);
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
