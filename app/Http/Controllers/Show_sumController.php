<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
Use App\Patient;
Use App\ Sickness;
use Session;


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
        $keep_patsick =  Pat_sick::Where([['id_patients','=',$id],['status','=','wait']])
              ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
              ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
              ->get();
//dd($keep_patsick);

        $data = array(
          'pat'=>$keeppat,
          'show_patsick'=>$keep_patsick

      );
        //dd($data);

      }
      //return redirect('sum',$data);
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
            $sickness->status = 'wait';
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
            $equipment->save();
        }//equipment

        $aller = $request->allergy;
        for ($i=0; $i < count($aller) ; $i++) {
          # code...
            $allergy = new Pat_Allergy;
            $allergy->id_patients = $id_pat;
            $allergy->id_allergies = $aller[$i];
            $allergy->save();
        }//allergy

        $id= Session::get('id_patient');
        //dd($id);
        if($id !== ''){
          $keeppat = Patient::Where('id_patients',$id)->get();
          //dd($Patient);
          $keep_patsick = Pat_sick::Where('id_patients',$id)
                ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                ->get();

          $data = array(
            'pat'=>$keeppat,
            'show_patsick'=>$keep_patsick

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
        //dd($Patient);

        $data = array(
          'pat'=>$keeppat,
          'show_patsick'=>$keep_patsick
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
