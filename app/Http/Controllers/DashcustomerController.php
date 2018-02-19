<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\patient;
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
{
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

            $findpat = Patient::where('id_customer','=',$getidcustomer)->get();

            foreach ($findpat as $getidpat) {
            $id_pat =  $getidpat['id_patients'];
            }

             Session::put('id_pat_sess',$id_pat);

            $findid = Select_care_status::where([['id_patients',$id_pat],['status_care','=','planning']])->get();
// dd($findid);
        // if ($findid ==['']) {
        //   //dd('ว่าง');
        //  $id_care=0;
        //     //return view('dashcustomer');
        //
        // }else {
        //   foreach ($findid as $getid) {
        //   $id_care =  $getid['id_caregivers'];
        //   }
        // }



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
