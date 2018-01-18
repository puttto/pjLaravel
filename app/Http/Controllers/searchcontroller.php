<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pat_sick;
use App\match_sick;
use App\Caregiver_skill;
Use App\Caregiver;

class searchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

      if($id !== ''){
         //dd($id);
        $patsick = Pat_sick::Where('id_patients','=',$id)
                  ->join('match_sicks','pat_sicks.id_sickness','=','match_sicks.id_sickness')
                  ->join('caregiver_skills','match_sicks.id_special__skills','=','caregiver_skills.id_special__skills')
                  ->join('caregivers','caregiver_skills.id_caregivers','=','caregivers.id_caregivers')
                  ->get();
      //  dd($patsick);


        $data = array('caregiverdata'=>$patsick);
      //dd($data);

//       foreach ($patsick as $patsickdata ) {
// dd($patsickdata);
//         $matchsick = match_sick:: Where('id_sickness',$patsickdata['id_sickness'])->get();
// //dd($matchsick);
//         foreach ($matchsick as $matchsickdata) {
//           $caregiver_skill= Caregiver_skill:: Where('id_special__skills',$matchsick['id_special__skills'])->get();
//             foreach ($caregiver_skill as $caregiver_skilldata) {
//               $caregiver = Caregiver:: Where('id_caregivers',$caregiver_skill['id_caregivers']);
//
// $data = array('caregiverdata'=>$caregiver);
//             }
//         }
//
//         //dd($data);
//       }

      }
        return view('search',$data);
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
