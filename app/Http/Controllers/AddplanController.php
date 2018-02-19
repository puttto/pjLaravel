<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plan;
use App\plan_detail;
use App\Patient;
use App\Caregiver;
use App\Select_care_status;
use Session;

class AddplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $id_c = Session::get('id_care_sess_care');

          $id_p = Session::get('id_pat_sess_care');
 // dd($id_p);

      $selectplan= Plan::where([['id_patients',$id_p],['id_caregivers',$id_c],['status_plan','=','use']])
            ->join('plan_details','plans.id_plans','=','plan_details.id_plans')
            ->get();

        $data = array('selectplan'=>$selectplan);

      return view('addactivity',$data);
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
      $this->validate($request,[
        'set_date'=> 'required',
      ]);

      $plan = new Plan;


      $id_c = Session::get('id_care_sess_care');
      $id_p = Session::get('id_pat_sess_care');

        $plan->id_patients = $id_p;
        $plan->id_caregivers = $id_c;
        $plan->status_plan = 'use';

        $plan->set_date = $request->set_date;

        $plan->save();

        $selectplan = plan::all();
            //dd($selectplan);
            foreach ($selectplan as $data) {
              $id_plan = $data['id_plans'];
            }

        $plandetail = new Plan_detail;

        $plandetail->doing = $request->doing;
        $plandetail->id_plans=$id_plan;

        if ($request->when_time == 'ตลอดทั้งวัน ทุกๆ :' ) {
            $plandetail->time = $request->when_time.$request->time."ชั่วโมง";
        }else {
          $plandetail->time = $request->when_time;
        }



        $plandetail->save();
        return redirect('authcare/addactivity');
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
