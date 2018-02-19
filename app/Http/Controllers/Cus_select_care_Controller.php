<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Select_care_status;
use App\Caregiver;
use App\Caregiver__details;
use App\patient;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
use Session;

class Cus_select_care_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $id =Session::get('id_pat_sess');

      $cus_select = Select_care_status::where([['id_patients',$id],['select_care_statuses.status_care','=','ad_select']])
            ->join('caregivers','select_care_statuses.id_caregivers','=','caregivers.id_caregivers')
            ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
            ->get();

        $data = array('cusselect'=>$cus_select);
        //dd($data);
        //เรียกมาจาก DB Select_care_status


//dd($data);
        return view('cusselect',$data);
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
      $idpatient = Session::get('id_pat_sess');
      //Session::get('id_patient');
      $iddata = $request->iddata;
      $sendiddate = explode(',', $iddata);

      $update_finish = Select_care_status::Where([['id_patients','=',$idpatient],['status_care','=','ad_select'],['id_caregivers','=',$sendiddate]])
                 ->update(['status_care'=>'finish']);


      $update_notselect = Select_care_status::Where([['id_patients','=',$idpatient],['status_care','!=','finish']])
                 ->update(['status_care'=>'Not_select']);

      $update_patient = patient::Where([['id_patients','=',$idpatient],['status','=','wait']])
                ->update(['status'=>'complete']);

      $update_patient = Caregiver::Where('id_caregivers','=',$sendiddate)
                 ->update(['caregiver_status'=>'work']);


                $completestatus_sick = Pat_sick::Where([['id_patients','=',$idpatient],['status','=','wait']])
                ->update(['status'=>'complete']); //
                $completestatus_equip = Pat_Equipment::Where([['id_patients','=',$idpatient],['status','=','wait']])
                ->update(['status'=>'complete']);
                $completetstatus_allergy = Pat_Allergy::Where([['id_patients','=',$idpatient],['status','=','wait']])
                ->update(['status'=>'complete']);
      //dd($idpatient);
      return redirect ('authcus/cusselect');



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
        if ($id !== '') {
        //  $patient = new Patient;
          $selectcare = Select_care_status::Where('id_patients',$id)->get();
          //dd($patient);
          $data = array(
            '$selectcare'=>$selectcare
          );
          return view('updatepat',$data);
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
