<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Customer;

use App\match_sick;
use App\Caregiver_skill;
use App\Caregiver;
use Carbon\Carbon;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$Patient = Patient::all();
        $Patient = Patient::where('status','=','request')->orderBy('id_patients', 'desc')->get();
        $get_id = '';
        foreach ($Patient as $id) {
            $get_id = $id['id_patients'];
        }

        $keepage = Patient::Where('id_patients',$get_id)
        ->select('birthday_Pat')
        ->get();
        $get_age = '';
        foreach ($keepage as $id) {
            $get_age = $id['birthday_Pat'];
        }
        $age = [Carbon::parse($get_age)->diff(Carbon::now())->format('%y ปี')];

      //  dd($Patient);
        // //$Customer= patient
        // $id_get = '';
        // foreach ($Patient as $id) {
        //     $id_get=$id['id_patients'];
        // }
        // $Patient= Patient::where('id', $id_get)->get();
        $data = array('display'=>$Patient,
                      'showage'=>$age
      );


        return view('dash', $data);
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
      $Patient = Patient::all();

      $data = array('display'=>$Patient);


      return view('dash', $data);
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
        // if($id !== ''){
        //   $Patient = Patient::find($id);
          //dd();
        //}

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
