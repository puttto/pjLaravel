<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\caregiver;
use App\caregiver_skill;
use App\Caregiver_Detail;
use App\Caregiver_Equipment;
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
use App\Otheractivity;
use App\Notediary;

use Auth;
use Carbon\Carbon;
use DB;
use Session;


class DashcustomerController extends Controller
{/**
 * Create a new controller instance.
 *
 * @return void
 */
public function __construct()
{
    $this->middleware('auth.customer');
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

           $get_id_login = Auth::guard('customer')->user()->id;
           //dd(Auth::guard('customer')->check());
            //  $get_id_login = 7;
            // dd($get_id_login);
            $id_customer = Customer::where('id_user_customers','=',$get_id_login)->get();
      //dd($id_care);
            foreach ($id_customer as $getidcus) {
            $getidcustomer =  $getidcus['id_customer'];
            }

            $patient = Patient::where('id_customer','=',$getidcustomer)->get();



            foreach ($patient as $getidpat) {
            $id_pat =  $getidpat['id_patients'];
             Session::put('id_pat_sess',$id_pat);
            }


            $keep_patsick = Pat_sick::Where([['patients.id_patients',$id_pat],['pat_sicks.status','=','complete']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat_sicks.status','=','wait']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat_sicks.status','=','request']])
                  ->join('patients','pat_sicks.id_patients','=','patients.id_patients')
                  //->join('pat_sicks','pat_sicks.id_patients','=','patients.id_patients')
                  ->join('sicknesses','pat_sicks.id_sickness','=','sicknesses.id_sickness')
                  ->select('pat_sicks.id_sickness','pat_sicks.id_patients','sicknesses.id_sickness','sicknesses.sick_name','sicknesses.sick_description')
                  ->get();

            $keep_equpment = Pat_Equipment::Where([['patients.id_patients',$id_pat],['pat__equipments.status','=','complete']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat__equipments.status','=','wait']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat__equipments.status','=','request']])
                  ->join('patients','pat__equipments.id_patients','=','patients.id_patients')
                  //->join('pat__equipments','pat__equipments.id_patients','=','patients.id_patients')
                  ->join('equipment','pat__equipments.id_equipment','=','equipment.id_equipment')
                  ->select('pat__equipments.id_equipment','pat__equipments.id_patients','equipment.id_equipment','equipment.equipment_name','equipment.equipment_description')
                  ->get();


            $keep_allergy = Pat_Allergy::Where([['patients.id_patients',$id_pat],['pat__allergies.status','=','complete']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat__allergies.status','=','wait']])
                  ->orWhere([['patients.id_patients',$id_pat],['pat__allergies.status','=','request']])
                  ->join('patients','pat__allergies.id_patients','=','patients.id_patients')
                  //->join('pat__allergies','pat__allergies.id_patients','=','patients.id_patients')
                  ->join('allergies','pat__allergies.id_allergies','=','allergies.id_allergies')
                  ->select('pat__allergies.id_allergies','pat__allergies.id_patients','allergies.id_allergies','allergies.allergy_name','allergies.allergy_description')
                  ->get();




            $findidcare = Select_care_status::where([['id_patients',$id_pat],['status_care','=','planning']])
             ->orWhere([['id_patients',$id_pat],['status_care','=','finish']])
            ->get();
                // dd($findidcare);


// dd($findid);


// dd($getidemp);
$id_care=0;
        if (!empty($findidcare)) {

          foreach ($findidcare as $getid) {
          $id_care =  $getid['id_caregivers'];
          }
        }
        else {
        $id_care=0;
        }

// dd($id_care);
        $caregiver = caregiver::where('caregivers.id_caregivers',$id_care)
        ->join('caregiver__details','caregivers.id_caregivers','=','caregiver__details.id_caregivers')
        ->get();
           // dd($caregiver);

        $keep_careskill = caregiver_skill::Where('caregiver_skills.id_caregivers',$id_care)
              ->join('special__skills','caregiver_skills.id_special_skills','=','special__skills.id_special_skills')
              ->select('caregiver_skills.id_caregivers','special__skills.id_special_skills','special__skills.special_skill_name','special__skills.special_skill_descption')
              ->get();
          // dd($keep_careskill);
        $keep_careequip = Caregiver_Equipment::where('caregiver__equipments.id_caregivers',$id_care)
              ->join('medical_equipments','caregiver__equipments.id_medical_equipments','=','medical_equipments.id_medical_equipments')
              ->select('caregiver__equipments.id_caregivers','medical_equipments.id_medical_equipments','medical_equipments.medical_equipment_name','medical_equipments.medical_equipment_description')
              ->get();
               // dd($keep_careequip);



            $showvital = Vital_sign::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_vital_signs', 'desc')
            ->get();
            $showsuction = suction::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_suctions', 'desc')
            ->get();
            $showsugar = Measure_suger::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_measure_sugers', 'desc')
            ->get();
            $showfeeding = feeding::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_feedings', 'desc')
            ->get();
            $showcolostomy = feces::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_feces', 'desc')
            ->get();
            $showcatheter = urinate::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_urinates', 'desc')
            ->get();

            $showother = Otheractivity::where('date_time', '>=', DB::raw('curdate()'))
            ->where('id_patients',$id_pat)->orderBy('id_otheractivities', 'desc')
            ->get();
            $shownotediary = Notediary::where('date_time', '>=', DB::raw('curdate()-3'))
            ->where('id_patients',$id_pat)->orderBy('id_notediaries', 'desc')
            ->get();
            $showother7d = Otheractivity::where('date_time', '>=', DB::raw('curdate()-7'))
            ->where('id_patients',$id_pat)->orderBy('id_otheractivities', 'desc')
            ->get();


            $showvitalmax = Vital_sign::where('id_patients',$id_pat)->orderBy('id_vital_signs', 'desc')->first();
            $showsuctionmax = suction::where('id_patients',$id_pat)->orderBy('id_suctions', 'desc')->first();
            $showsugarmax = Measure_suger::where('id_patients',$id_pat)->orderBy('id_measure_sugers', 'desc')->first();
            $showfeedingmax = feeding::where('id_patients',$id_pat)->orderBy('id_feedings', 'desc')->first();

            // $showcolostomymax = feces::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_feces', 'desc')->first();
            // $showcathetermax = urinate::where([['id_patients',$id_pat],['id_caregivers',$id_care]])->orderBy('id_urinates', 'desc')->first();

            $showcolostomycount = feces::where('date_time', '>=', DB::raw('curdate()-7'))
                                    ->where('id_patients',$id_pat)
                                    // ->count('id_measure_sugers');
                                    ->get();
            $countcolostomy = count($showcolostomycount);

            $showcathetersum = urinate::where('date_time', '>=', DB::raw('curdate()'))
                                    ->where('id_patients',$id_pat)
                                    ->sum('vol');
// dd($showcathetersum);
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
                    'caregiver'=>$caregiver,
                    'careskill'=>$keep_careskill,
                    'careequip'=>$keep_careequip,
                    'patient'=>$patient,
                    'patsick'=>$keep_patsick,
                    'equpment'=>$keep_equpment,
                    'allergy'=>$keep_allergy,
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
              return view('dashcustomer',$data);
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
