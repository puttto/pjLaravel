<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caregiver;
use App\patient;
use App\Pat_sick;
use App\Pat_Equipment;
use App\Pat_Allergy;
use App\plan;
use App\Select_care_status;

use App\urinate;
use App\feces;
use App\suction;
use App\Vital_sign;
use App\Measure_suger;
use App\feeding;
use App\otheractivity;
use App\notediary;

use Auth;
use Carbon\Carbon;
use DB;
use Session;


class DashcaregiverController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth.caregiver');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
// $id_pat=19;
// $id_care=10;

      $get_id_login = Auth::guard('caregiver')->user()->id;
      // dd(Auth::guard('caregiver')->check());
       // dd($get_id_login);
// //dd($id_care);

      $caregiver = Caregiver::where('id_user_caregivers','=',$get_id_login)->get();
      // dd($id_caregiver);

      foreach ($caregiver as $getidcare) {
      $id_care = $getidcare['id_caregivers'];
      }
      // dd($id_care);
      Session::put('id_care_sess_care',$id_care);
      $findid = Select_care_status::where([['id_caregivers',$id_care],['status_care','=','planning']])->get();
      // dd($findid);

      $id_pat=0;
      foreach ($findid as $getid) {
      $id_pat =  $getid['id_patients'];

      }
     // dd($id_pat);

      if (empty($id_pat)) {

      //dd('ว่าง');
       $id_pat=0;

          //return view('dashcustomer');

      }else {
        foreach ($findid as $getid) {
        $id_pat =  $getid['id_patients'];

        }

      }
      Session::put('id_pat_sess_care',$id_pat);

      // dd($id_pat);
      $patient = patient::where([['patients.id_patients',$id_pat]
      // ,['pat_sicks.status','=','complete'],['pat__equipments.status','=','complete'],['pat__allergies.status','=','complete']
    ])
      // ->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
      // ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
      // ->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
      // ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
      // ->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
      // ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
      ->get();
        // dd($patient);

       $keep_patsick = Pat_sick::Where([['patients.id_patients',$id_pat],['pat_sicks.status','=','complete']])
             ->join('patients','pat_sicks.id_patients','=','patients.id_patients')
             //->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
             ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
             ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
             ->get();

       $keep_equpment = Pat_Equipment::Where([['patients.id_patients',$id_pat],['pat__equipments.status','=','complete']])
              ->join('patients','pat__equipments.id_patients','=','patients.id_patients')
             //->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
             ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
             ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
             ->get();


       $keep_allergy = Pat_Allergy::Where([['patients.id_patients',$id_pat],['pat__allergies.status','=','complete']])
              ->join('patients','pat__allergies.id_patients','=','patients.id_patients')
             //->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
             ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
             ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
             ->get();



//dd($id_pat);

      $showvital = Vital_sign::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_vital_signs', 'desc')
      ->get();
      $showsuction = suction::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_suctions', 'desc')
      ->get();
      $showsugar = Measure_suger::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_measure_sugers', 'desc')
      ->get();
      $showfeeding = feeding::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_feedings', 'desc')
      ->get();
      $showcolostomy = feces::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_feces', 'desc')
      ->get();
      $showcatheter = urinate::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_urinates', 'desc')
      ->get();

      $showother = Otheractivity::where('date_time', '>=', DB::raw('curdate()'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_otheractivities', 'desc')
      ->get();
      $shownotediary = Notediary::where('date_time', '>=', DB::raw('curdate()-3'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_notediaries', 'desc')
      ->get();

      $showother7d = Otheractivity::where('date_time', '>=', DB::raw('curdate()-7'))
      ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_otheractivities', 'desc')
      ->get();


      $showvitalmax = Vital_sign::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_vital_signs', 'desc')->first();
      $showsuctionmax = suction::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_suctions', 'desc')->first();
      $showsugarmax = Measure_suger::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_measure_sugers', 'desc')->first();
      $showfeedingmax = feeding::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_feedings', 'desc')->first();

      // $showcolostomymax = feces::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_feces', 'desc')->first();
      // $showcathetermax = urinate::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_urinates', 'desc')->first();

      $showcolostomycount = feces::where('date_time', '>=', DB::raw('curdate()-7'))
                              ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])
                              // ->count('id_measure_sugers');
                              ->get();
      $countcolostomy = count($showcolostomycount);

      $showcathetersum = urinate::where('date_time', '>=', DB::raw('curdate()'))
                              ->where([['id_patients',$id_pat],['id_caregivers',$id_care]])
                              ->sum('vol');

            //->join('measure_sugers', 'measure_sugers.id_measure_sugers')


// $Average=0;
// $i=0;
// foreach ($showvital as $avg) {
//   $Average=$Average+$avg['sys'];
//   $i++;
// }
//
// $sumavg=$Average/$i;

            //dd($showactivity);
            $data = array(
              'patient'=>$patient,
              'patsick'=>$keep_patsick,
              'equpment'=>$keep_equpment,
              'allergy'=>$keep_allergy,
              'caregiver'=>$caregiver,
              'showvital' =>$showvital,
              'showsuction'=>$showsuction,
              'showsugar'=>$showsugar,
              'showfeeding'=>$showfeeding,
              'showcolostomy'=>$showcolostomy,
              'showcatheter'=>$showcatheter,
              'showvitalmax'=>$showvitalmax,
              'showsuctionmax'=>$showsuctionmax,
              'showsugarmax'=>$showsugarmax,
              'showfeedingmax'=>$showfeedingmax,
              'countcolostomy'=>$countcolostomy,
              'showcathetersum'=>$showcathetersum,
              'showother'=>$showother,
              'shownotediary'=>$shownotediary,
              'showother7d'=>$showother7d
              // 'avg'=>$sumavg,


            );
//dd($data);
        return view('dashcaregiver',$data);
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
        //
    }
}
