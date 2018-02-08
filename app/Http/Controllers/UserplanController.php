<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caregiver;
use App\Patient;
use App\Select_care_status;
use App\plan;
use Session;

class UserplanController extends Controller
{
    /**
     * Display a listing of the resource.;
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $userplan = Select_care_status::Where('select_care_statuses.status_care','=','finish')
            ->join('patients','select_care_statuses.id_patients','=','patients.id_patients')
            ->join('caregivers','select_care_statuses.id_caregivers','=','caregivers.id_caregivers')
            ->get();

                //dd($userplan);
                $data = array(
                  'userplan' => $userplan
                );

      return view('userplan',$data);
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
      Session::put('id_select_care_statuses',$id);
      $update_planning = Select_care_status::Where([['id_select_care_statuses','=',$id],['status_care','=','finish']])
                 ->update(['status_care'=>'planning']);

          // $plan_select = Select_care_status::where([['id_select_care_statuses','=',$id],['status_care','=','planning']])
          //       ->get();
          //
          //     foreach ($plan_select as $data) {
          //       $id_pat=$data['id_patients'];
          //         $id_care=$data['id_caregivers'];
          //     }

              // $plan_insert = new Plan;

                //dd($id_pat);
        //
        return redirect('createplan');
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
