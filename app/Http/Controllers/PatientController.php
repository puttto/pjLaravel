<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Patient;
Use APP\Sickness;
use Session;
use View;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $Customer= Customer::table('customers')->latest()->first();
        //           dd($Customer);
        // $id_get = '';
        // foreach ($Customer as $id) {
        //     $id_get=$id['id'];
        // }
        $Patient = Patient::all();
        $data = array(
          'Patient'=>$Patient
        );

        return view('patient', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


      return view(patient);
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
        // $this->validate($request,[
        //   'Name_pat'=> 'required|max:100',
        //   'Lastname_pat'=> 'required|max:100',
        //   'Nickname_pat'=> 'required|max:100',
        // ]);

        $this->validate($request,[
          'Name'=> 'required|max:50',
          'Lastname'=> 'required|max:100',
          'Telephone'=> 'required|max:15',
          'Mobilephone'=> 'required|max:15',
          'Address'=> 'required|max:191',
          'Lineid'=> 'required|max:100',
          // 'ID_card_cus'=> 'required|max:13',
          'Email'=> 'required|email|max:100',
        ]);

     $Customer = new Customer;

        //$Customer ->name_cus = $request->Name.$request->Lastname;
        $Customer ->name_cus = $request->Name;
        $Customer->lastname_cus = $request->Lastname;
        $Customer->telephone_cus = $request->Telephone;
        $Customer->mobilephone_cus = $request->Mobilephone;
        $Customer->address_cus = $request->Address;
        $Customer->lineid_cus = $request->Lineid;



        $data_ID_card_cus = $request->ID_card_cus;
          //dd($data_ID_card_cus);
        // foreach ($data_ID_card_cus as $keepid_card ) {
        //
        // $Customer->id_card_cus =  $keepid_card;
        // }

        $data_ID_card_cus_all='';
      //$iCount = count($data_ID_card_cus);
        for ($i=0; $i < count($data_ID_card_cus) ; $i++) {
          if(($i+1)===count($data_ID_card_cus)){
            $data_ID_card_cus_all .= $data_ID_card_cus[$i];
              $Customer->id_card_cus =$data_ID_card_cus_all;
          }
          else{
              $data_ID_card_cus_all .= $data_ID_card_cus[$i]."-";
          }

          // $Customer->id_card_cus =$data_ID_card_cus[$i];
              //dd($keepid_card);
        }

        $Customer->email_cus = $request->Email;
        $Customer->save();
        Session::put('customer_id',$Customer->id);
     //    //session(['customer' => '$data->id']);
     //
     //     // session(['customer' => '1']);
     //    // Session::put('customer',$Customer->id_customer);
     //  }
     //  else {
     //    $Patient = new Patient;
     //
     //    $id_cus= Session::get('customer_id');
     //
     //    $Patient->gender_Pat = $request->gender;
     //    $Patient ->name_Pat = $request->Name_pat;
     //    $Patient->lastname_Pat = $request->Lastname_pat;
     //    $Patient->nickname_Pat = $request->Nickname_pat;
     //    $Patient->nationality_Pat = $request->Nationality;
     //    $Patient->race_Pat = $request->Race;
     //    $Patient->religion_Pat = $request->Religion;
     //    $Patient->id_card_Pat = $request->ID_Card_pat;
     //    $Patient->birthday_Pat = $request->Birthday;
     //    $Patient->weight_Pat = $request->Weight;
     //    $Patient->hight_Pat = $request->Hight;
     //    $Patient->interesting_Pat = $request->interesting;
     //    $Patient->id_customer = $id_cus;
     //
     //    $Patient->save();
     //  }
     //
         return redirect('patient');
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
      if ($id !== '') {
      //  $patient = new Patient;
        $patient = Patient::Where('id_patients',$id)->get();
        //dd($patient);
        $data = array(
          'pat'=>$patient
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
         //$Patient = Patient::find($id);
         //$Patient = new Patient;

         //$id_cus= Session::get('customer_id');
        //
        //  $Patient->gender_Pat = $request->gender;
        //  $Patient ->name_Pat = $request->Name_pat;
        //  $Patient->lastname_Pat = $request->Lastname_pat;
        //  $Patient->nickname_Pat = $request->Nickname_pat;
        //  $Patient->nationality_Pat = $request->Nationality;
        //  $Patient->race_Pat = $request->Race;
        //  $Patient->religion_Pat = $request->Religion;
        // // $Patient->id_card_Pat = $request->ID_Card_pat;
        //  $Patient->birthday_Pat = $request->Birthday;
        //  $Patient->weight_Pat = $request->Weight;
        //  $Patient->hight_Pat = $request->Hight;
        //  $Patient->interesting_Pat = $request->interesting;
        //  $Patient->hospital_pat = $request->Hospital;
        //  //$Patient->id_customer = $id_cus;
        //
        //
        //  $data_id_card_Pat = $request->ID_Card_pat;
        //  $data_ID_card_pat_all='';
        //  for ($i=0; $i < count($data_id_card_Pat) ; $i++) {
        //    if(($i+1)===count($data_id_card_Pat)){
        //      $data_ID_card_pat_all .= $data_id_card_Pat[$i];
        //         $Patient->id_card_Pat =$data_ID_card_pat_all;
        //    }
        //    else{
        //        $data_ID_card_pat_all .= $data_id_card_Pat[$i]."-";
        //    }
        //  }
        //
        //
        // $Patient->save();

         //Session::put('id_patient',$Patient->id);

        // Session::flash('message', 'Successfully updated ');
            return redirect('updatesick/'.$id.'/edit');
       }
         // return redirect('updatesick/'.$id.'/edit');

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
