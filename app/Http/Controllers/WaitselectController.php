<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Select_care_status;

class WaitselectController extends Controller
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

      $waitselect = Select_care_status::Where('select_care_statuses.status_care','=','ad_select')
            ->join('caregivers','select_care_statuses.id_caregivers','=','caregivers.id_caregivers')
            ->join('patients','select_care_statuses.id_patients','=','patients.id_patients')
            ->join('customers','patients.id_customer','=','customers.id_customer')
            ->select('patients.id_patients'
            ,'caregivers.id_caregivers','customers.id_customer','name_care','lastname_care','name_Pat','lastname_Pat','name_cus','lastname_cus','mobilephone_cus','id_select_care_statuses'
          )->distinct()
            ->get();

                //dd($waitselect);
                $data = array(
                  'waitselect' => $waitselect
                );
                  // dd($data);
        return view('waitselect',$data);
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
      $select_care_del= Select_care_status::where([['id_select_care_statuses',$id],['status_care','=','ad_select']])
             ->update(['status_care'=>'ad_del']);
             return redirect('/waitselect');
    }
}
