<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Patient;
use APP\Sickness;
use App\nat_rase;
use Session;
use View;

use App\User_customer;
use App\Http\Controllers\AuthcustomerController;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $nat_rase = nat_rase::all();
        $Patient = Patient::all();
        $data = array(
          'nat_rase'=>$nat_rase,
          'Patient'=>$Patient
        );

        return view('patient', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('admin.guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
              'Name_pat' => 'required|string|max:255',
             'Email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:6|confirmed',
         ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        dd($data);
        return User_customer::create([
             'name' => $data['Name_pat'],
             'email' => $data['Email'],
             'password' => bcrypt($data['password']),
         ]);
    }
    // public function showRegistrationForm()
    // {
    //     return view('admin.auth.register');
    // }
    protected function guard()
    {
        return Auth::guard('caregiver');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'Name'=> 'required|string|max:255',
          'Lastname'=> 'required|max:100',
          'Telephone'=> 'required|max:15',
          'Mobilephone'=> 'required|max:15',
          'Address'=> 'required|max:191',
          'Lineid'=> 'required|max:100',
          // 'ID_card_cus'=> 'required|max:13',
          //'Email'=> 'required|email|max:100',

          'Email' => 'required|string|email|max:255|unique:users,email',
          'password' => 'required|min:6',
        ]);

        $user_customer = new User_customer;
        $user_customer ->name = $request->Name;
        $user_customer ->email = $request->Email;

        $password=$request->password;
        $bcryptpass=bcrypt($password);

        $user_customer ->password = $bcryptpass;
        $user_customer->save();

        $Customer = new Customer;

        //$Customer ->name_cus = $request->Name.$request->Lastname;
        $Customer ->name_cus = $request->Name;
        $Customer->lastname_cus = $request->Lastname;
        $Customer->telephone_cus = $request->Telephone;
        $Customer->mobilephone_cus = $request->Mobilephone;
        $Customer->address_cus = $request->Address;
        $Customer->lineid_cus = $request->Lineid;




        $data_ID_card_cus = $request->ID_card_cus;

        $data_ID_card_cus_all='';
        //$iCount = count($data_ID_card_cus);
        for ($i=0; $i < count($data_ID_card_cus) ; $i++) {
            if (($i+1)===count($data_ID_card_cus)) {
                $data_ID_card_cus_all .= $data_ID_card_cus[$i];
                $Customer->id_card_cus =$data_ID_card_cus_all;
            } else {
                $data_ID_card_cus_all .= $data_ID_card_cus[$i]."-";
            }

            // $Customer->id_card_cus =$data_ID_card_cus[$i];
              //dd($keepid_card);
        }

        //$Customer->email_cus = $request->Email;
        $Customer->id_user_customers = $user_customer->id;
        $Customer->save();




        Session::put('customer_id', $Customer->id);

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
        if ($id !== '') {
            //  $patient = new Patient;
            $nat_rase = nat_rase::all();
            $patient = Patient::Where('id_patients', $id)->get();
            //dd($patient);
            $data = array(
          'nat_rase'=>$nat_rase,
          'pat'=>$patient
        );
            return view('updatepat', $data);
        }
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
        if ($id !== '') {
            //dd($request->ID_Card_pat);
            $this->validate($request, [
        'Name_pat'=> 'required|max:50',
        'Lastname_pat'=> 'required|max:50',
        'Nickname_pat'=> 'required|max:50',
        'Nationality'=> 'required|max:50',
        'Race'=> 'required|max:50',
        'Religion'=> 'required|max:50',
        'ID_Card_pat'=> 'required|max:13',
        'Birthday'=> 'required',
        'Weight'=> 'required|numeric|min:1',
        'Hight'=> 'required|numeric|min:1',
        'interesting'=> 'max:200',
        'hospital_pat'=> 'max:100',
      ]);
            $data_id_card_Pat = $request->ID_Card_pat;
            $data_ID_card_pat_all='';
            for ($i=0; $i < count($data_id_card_Pat) ; $i++) {
                if (($i+1)===count($data_id_card_Pat)) {
                    $data_ID_card_pat_all .= $data_id_card_Pat[$i];
                    //$Patient->id_card_Pat =$data_ID_card_pat_all;
                } else {
                    $data_ID_card_pat_all .= $data_id_card_Pat[$i]."-";
                }
            }
            $Patient = Patient::Where('id_patients', $id)
                    ->update(
                        ['lastname_Pat'=>$request->Lastname_pat,
                    'name_Pat'=>$request->Name_pat,
                    'lastname_Pat'=>$request->Lastname_pat,
                    'nickname_Pat'=>$request->Nickname_pat,
                    'nationality_Pat'=>$request->Nationality,
                    'race_Pat'=>$request->Race,
                    'religion_Pat'=>$request->Religion,
                    'birthday_Pat'=>$request->Birthday,
                    'weight_Pat'=>$request->Weight,
                    'hight_Pat'=>$request->Hight,
                    'interesting_Pat'=>$request->interesting,
                    'hospital_pat'=>$request->Hospital,
                    'id_card_Pat'=>$data_ID_card_pat_all]
                      );
            //$Patient = Patient::find($id);
            //$Patient = new Patient;

            //$id_cus= Session::get('customer_id');
            //
            //  $Patient->gender_Pat = $request->gender;
            //  $Patient ->name_Pat = $request->Name_pat;
            //  $Patient->lastname_Pat = $request->Lastname_pat;
            //  $Patient->nickname_Pat = $request->Nickname_pat;
            //  $Patient->nationality_Pat = $request->Nationality;
            //  $Patient->race_Pat = $request->Race;
            //  $Patient->religion_Pat = $request->Religion;
            // // $Patient->id_card_Pat = $request->ID_Card_pat;
            //  $Patient->birthday_Pat = $request->Birthday;
            //  $Patient->weight_Pat = $request->Weight;
            //  $Patient->hight_Pat = $request->Hight;
            //  $Patient->interesting_Pat = $request->interesting;
            //  $Patient->hospital_pat = $request->Hospital;
            //  //$Patient->id_customer = $id_cus;
            //
            //
            //  $data_id_card_Pat = $request->ID_Card_pat;
            //  $data_ID_card_pat_all='';
            //  for ($i=0; $i < count($data_id_card_Pat) ; $i++) {
            //    if(($i+1)===count($data_id_card_Pat)){
            //      $data_ID_card_pat_all .= $data_id_card_Pat[$i];
            //         $Patient->id_card_Pat =$data_ID_card_pat_all;
            //    }
            //    else{
            //        $data_ID_card_pat_all .= $data_id_card_Pat[$i]."-";
            //    }
            //  }
            //
            //
            // $Patient->save();

            //Session::put('id_patient',$Patient->id);

            // Session::flash('message', 'Successfully updated ');
            return redirect('updatesick/'.$id.'/edit');
        }
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
