<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\patient;
use App\caregiver;
use App\select_care_status;
use App\pat_sicks;
use App\pat__equipments;
use App\pat__allergies;
use App\nat_rase;
use App\plan;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;


class UserCusController extends Controller
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

      $usercus = patient::Where('status','=','request')
                          ->orWhere('status','=','wait')
                          ->orWhere('status','=','complete')
                          ->orWhere('status','=','close')
                          ->join('customers','customers.id_customer','=','patients.id_customer')
                          ->orderBy('status', 'desc')
                          ->get();
                          // dd($usercus);

                          $data = array(

                            'usercus'=>$usercus);
        return view('usercustomer',$data);
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
      $usercus = patient::Where([['id_patients',$id],['status','=','complete']])
                          ->orWhere([['id_patients',$id],['status','=','close']])
                          ->update(['status'=>'request']);

      $status_sick = Pat_sick::Where([['id_patients','=',$id],['status','=','complete']])
                          ->orWhere([['id_patients',$id],['status','=','close']])
                          ->update(['status'=>'request']); //
      $status_equip = Pat_Equipment::Where([['id_patients','=',$id],['status','=','complete']])
                          ->orWhere([['id_patients',$id],['status','=','close']])
                          ->update(['status'=>'request']);
      $status_allergy = Pat_Allergy::Where([['id_patients','=',$id],['status','=','complete']])
                          ->orWhere([['id_patients',$id],['status','=','close']])
                          ->update(['status'=>'request']);

      $update_status= Select_care_status::where([['id_patients',$id],['status_care','=','complete']])
                          ->update(['status_care'=>'close']);

       $select_care= Select_care_status::where('id_patients',$id)->get();
       foreach ($select_care as $gatcare) {

         $idcare=$gatcare['id_caregivers'];
       }

      $usercare = caregiver::where([['id_caregivers',$idcare,],['caregiver_status','=','work']])
                    ->update(['caregiver_status'=>'not_work']);

      $closeplan = plan::where([['id_patients',$id],['status_plan','=','use']])
                    ->orWhere([['id_patients',$id],['status_plan','=','unuse']])
                    ->update(['status_plan'=>'close']);

                    return redirect('/usercustomer');
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
        //  $patient = new Patient;
          $nat_rase = nat_rase::all();
          $patient = Patient::Where('id_patients',$id)->get();
          //dd($patient);
          $data = array(
            'nat_rase'=>$nat_rase,
            'pat'=>$patient
          );
          return view('updateuserpat',$data);
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
      if ($id !== '') {
      //dd($request->ID_Card_pat);
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
      $data_id_card_Pat = $request->ID_Card_pat;
      $data_ID_card_pat_all='';
      for ($i=0; $i < count($data_id_card_Pat) ; $i++) {
        if(($i+1)===count($data_id_card_Pat)){
          $data_ID_card_pat_all .= $data_id_card_Pat[$i];
             //$Patient->id_card_Pat =$data_ID_card_pat_all;
        }
        else{
            $data_ID_card_pat_all .= $data_id_card_Pat[$i]."-";
        }
      }
         $Patient = Patient::Where('id_patients',$id)
                    ->update(['lastname_Pat'=>$request->Lastname_pat,
                    'name_Pat'=>$request->Name_pat,
                    'lastname_Pat'=>$request->Lastname_pat,
                    'nickname_Pat'=>$request->Nickname_pat,
                    'nationality_Pat'=>$request->Nationality,
                    'race_Pat'=>$request->Race,
                    'religion_Pat'=>$request->Religion,
                    'birthday_Pat'=>$request->Birthday,
                    'weight_Pat'=>$request->Weight,
                    'hight_Pat'=>$request->Hight,
                    'interesting_Pat'=>$request->interesting,
                    'hospital_pat'=>$request->Hospital,
                    'id_card_Pat'=>$data_ID_card_pat_all]
                      );

            return redirect('usercustomer');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $usercus = patient::Where([['id_patients',$id],['status','=','complete']])
                          ->update(['status'=>'close']);

      $status_sick = Pat_sick::Where([['id_patients','=',$id],['status','=','wait']])
                          ->update(['status'=>'close']); //
      $status_equip = Pat_Equipment::Where([['id_patients','=',$id],['status','=','wait']])
                          ->update(['status'=>'close']);
      $status_allergy = Pat_Allergy::Where([['id_patients','=',$id],['status','=','wait']])
                          ->update(['status'=>'close']);
// dd($usercus);


        $update_status= Select_care_status::where([['id_patients',$id],['status_care','=','complete']])
               ->update(['status_care'=>'close']);

               $select_care= Select_care_status::where('id_patients',$id)->get();
               foreach ($select_care as $gatcare) {

                 $idcare=$gatcare['id_caregivers'];
               }

        $usercare = caregiver::where([['id_caregivers',$idcare],['caregiver_status','=','work']])
                      ->update(['caregiver_status'=>'not_work']);

        $closeplan = plan::where([['id_patients',$id],['status_plan','=','use']])
                      ->update(['status_plan'=>'unuse']);

                          return redirect('/usercustomer');
    }
}
