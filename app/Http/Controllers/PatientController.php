<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Patient;
Use APP\Sickness;
use Session;

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
     $Customer = new Customer;

        $Customer ->name_cus = $request->Name;
        $Customer->lastname_cus = $request->Lastname;
        $Customer->telephone_cus = $request->Telephone;
        $Customer->mobilephone_cus = $request->Mobilephone;
        $Customer->address_cus = $request->Address;
        $Customer->lineid_cus = $request->Lineid;
        $Customer->id_card_cus = $request->ID_card_cus;
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
