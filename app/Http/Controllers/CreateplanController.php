<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plan;
use App\plan_detail;
use App\Patient;
use App\Caregiver;
use App\Select_care_status;
use Session;
class CreateplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $selectplan = plan::all()
      //     ->latest()
      //     ->first();
      //
      //     dd($selectplan);
      $id = Session::get('id_select_care_statuses');
      $plan_select = Select_care_status::where([['id_select_care_statuses','=',$id],['status_care','=','planning']])
            ->get();

          foreach ($plan_select as $data) {

               Session::put('id_pat',$data['id_patients']);
               Session::put('id_care',$data['id_caregivers']);

          }

          $id_c =  Session::get('id_care');
          $id_p =  Session::get('id_pat');
      $selectplan= Plan::where([['id_patients',$id_p],['id_caregivers',$id_c],['status_plan','=','use']])
            ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
            ->get();

        $data = array('selectplan'=>$selectplan);
        return view('createplan',$data);
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

      $plan = new Plan;


      $id_c =  Session::get('id_care');
      $id_p =  Session::get('id_pat');

        $plan->id_patients = $id_p;
        $plan->id_caregivers = $id_c;
        $plan->status_plan = 'use';

        $plan->set_date = $request->set_date;
        $plan->until_date = $request->until_date;
        $plan->save();

        $selectplan = plan::all();
            //dd($selectplan);
            foreach ($selectplan as $data) {
              $id_plan = $data['id_plans'];
            }

        $plandetail = new Plan_detail;
        $plandetail->time = $request->when_time;
        $plandetail->doing = $request->doing;
        $plandetail->id_plans=$id_plan;



        $plandetail->save();
        return redirect('createplan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $plan_select = Select_care_status::where([['id_select_care_statuses','=',$id],['status_care','=','planning']])
            ->get();

          foreach ($plan_select as $data) {

               Session::put('id_pat',$data['id_patients']);
               Session::put('id_care',$data['id_caregivers']);

          }
          $id_c =  Session::get('id_care');
          $id_p =  Session::get('id_pat');

          $selectplan= Plan::where([['id_patients',$id_p],['id_caregivers',$id_c],['status_plan','=','use']])
                ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
                ->get();

            $data = array('selectplan'=>$selectplan);
            return view('createplan',$data);

          // $plan_insert = new Plan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $selectplan= Plan::where([['id_plans',$id],['status_plan','=','use']])
             ->update(['status_plan'=>'unuse']);
             return redirect('createplan');
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
      $selectplan= Plan::where([['id_plans',$id],['status_plan','=','use']])
             ->update(['status_plan'=>'unuse']);

             return redirect('createplan');


    }
}
