<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sickness;
use App\patient;
use App\Customer;
use App\Equipment;
use App\Allergy;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
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
        $this->validate($request,[
          'Name_pat'=> 'required|max:50',
          'Lastname_pat'=> 'required|max:50',
          'Nickname_pat'=> 'required|max:50',
          'Nationality'=> 'required|max:50',
          'Race'=> 'required|max:50',
          'Religion'=> 'required|max:50',
          'ID_Card_pat'=> 'required|max:13',
          'Birthday'=> 'required',
          'Weight'=> 'required|numeric|min:1',
          'Hight'=> 'required|numeric|min:1',
          'interesting'=> 'max:200',
          'hospital_pat'=> 'max:100',
        ]);

           $Patient = new Patient;

           $id_cus= Session::get('customer_id');

           $Patient->gender_Pat = $request->gender;
           $Patient ->name_Pat = $request->Name_pat;
           $Patient->lastname_Pat = $request->Lastname_pat;
           $Patient->nickname_Pat = $request->Nickname_pat;
           $Patient->nationality_Pat = $request->Nationality;
           $Patient->race_Pat = $request->Race;
           $Patient->religion_Pat = $request->Religion;
          // $Patient->id_card_Pat = $request->ID_Card_pat;
           $Patient->birthday_Pat = $request->Birthday;
           $Patient->weight_Pat = $request->Weight;
           $Patient->hight_Pat = $request->Hight;
           $Patient->interesting_Pat = $request->interesting;
           $Patient->hospital_pat = $request->Hospital;
           $Patient->id_customer = "20";


           $data_id_card_Pat = $request->ID_Card_pat;
           $data_ID_card_pat_all='';
           for ($i=0; $i < count($data_id_card_Pat) ; $i++) {
             if(($i+1)===count($data_id_card_Pat)){
               $data_ID_card_pat_all .= $data_id_card_Pat[$i];
                  $Patient->id_card_Pat =$data_ID_card_pat_all;
             }
             else{
                 $data_ID_card_pat_all .= $data_id_card_Pat[$i]."-";
             }
           }


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
      //dd($id);
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
      if ($id !== '') {
      //  $patient = new Patient
      //dd($id);
        $pat_sick = Pat_sick::Where('id_patients',$id)
        ->get();
        $deletesick = Pat_sick::Where('id_patients',$id)
        ->update(['status'=>'del']);
        //->Where('status','wait')


        $sickness = Sickness::all();
        // $data = array(
        //   'sickness'=>$sickness
        // );
        $equipment = Equipment::all();
        $allergy = Allergy::all();
        $data = array(
          'sickness'=>$sickness,
          'equipment'=>$equipment,
          'allergy'=>$allergy,
          'pat'=>$pat_sick
        );
        //dd($patient);

        return view('updatesick',$data);
      }
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
      //dd($id);


        //
        if ($id !== '') {
        //$id_pat= Session::get('id_patient');
        $sick = $request->sickness;
        for ($i=0; $i < count($sick) ; $i++) {
          # code...
            $sickness = new Pat_sick;
            $sickness->id_patients = $id;
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
            $equipment->id_patients = $id;
            $equipment->id_equipment = $equip[$i];
            $equipment->save();
        }//equipment

        $aller = $request->allergy;
        for ($i=0; $i < count($aller) ; $i++) {
          # code...
            $allergy = new Pat_Allergy;
            $allergy->id_patients = $id;
            $allergy->id_allergies = $aller[$i];
            $allergy->save();
        }//allergy

      //  $id= Session::get('id_patient');
        //dd($id);
        if($id !== ''){
          $keeppat = Patient::Where('id_patients',$id)->get();
          //dd($Patient);

          $data = array('pat'=>$keeppat);
          //dd($data);

        }
  }

           return redirect('sum');
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
