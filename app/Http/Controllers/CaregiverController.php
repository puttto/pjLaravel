<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caregiver;
use App\Caregiver_Detail;
use App\Special_Skill;
use App\Caregiver_skill;
use App\Caregiver_Equipment;
use App\Medical_equipment;
use App\User_caregiver;
use App\nat_rase;
use Session;
use Image;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nat_rase = nat_rase::all();
        $special_skill = Special_Skill::all();
        $medical_equipment = Medical_equipment::all();
        $data = array(
          'nat_rase'=>$nat_rase,
          'special__skills'=>$special_skill,
          'medical_equipments'=>$medical_equipment
        );

        return view('caregiver',$data);
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
        $this->validate($request, [
          'care_img'=>'required',
        'Name_care'=> 'required|max:50',
        'Lastname_care'=> 'required|max:50',
        'Nickname_care'=> 'required|max:50',
        'Gender_care'=> 'required|max:50',
        //รอsetformat date
        'Weight_care'=> 'required|max:50',
        'Hight_care'=> 'required|max:50',
        'Nationality_care'=> 'required|max:50',
        'Race_care'=> 'required|max:50',
        'Religion_care'=> 'required|max:50',
        'ID_Card_care'=> 'required|max:13',
        'Address_care'=> 'required|max:200',
        'Mobilephone_care'=> 'required|max:15',
        'Lineid'=> 'required|max:50',

        'Year_of_Caregiver'=> 'required|max:50',
        'Edu_Caregiver'=> 'required|max:50',
        'Type_of_living'=> 'required|max:50',
        'Rest_day'=> 'required',
        // 'special_skill'=> 'required|max:50',
        // 'medical_equipment'=> 'required|max:50',

        'Email' => 'required|string|email|max:255|unique:users,email',
        'Password' => 'required|min:6',

      ]);
      $User_caregiver = new User_caregiver;
      $User_caregiver ->name = $request->Name_care;
      $User_caregiver ->email = $request->Email;

        $password=$request->Password;
        $bcryptpass=bcrypt($password);

          $User_caregiver ->password = $bcryptpass;
          $User_caregiver->save();


        $caregiver = new caregiver;

        $caregiver ->name_care = $request->Name_care;
        $caregiver ->lastname_care = $request->Lastname_care;
        $caregiver ->nickname_care = $request->Nickname_care;
        $caregiver ->gender_care = $request->Gender_care;
        $caregiver ->birthday_care = $request->Birthday_care;
        $caregiver ->weight_care = $request->Weight_care;
        $caregiver ->hight_care = $request->Hight_care;
        $caregiver ->nationality_care = $request->Nationality_care;
        $caregiver ->race_care = $request->Race_care;
        $caregiver ->religion_care = $request->Religion_care;
        $caregiver ->id_line_care = $request->Lineid;
        $caregiver ->mobilephone_care = $request->Mobilephone_care;

        if ($request->hasFile('care_img')) {
          $image = $request->file('care_img');
          // dd($image);
          $filename = time().'.'.$image->getClientOriginalExtension(); //time.jpeg
          // $filename = time().'.'.$image->encode('png'); //time.png
          $location = public_path('images/'.$filename);
          $img = Image::make($image);
          // dd($filename);

          $img->resize(null, 400, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $img->save($location);


            $caregiver ->img_name = $filename;
        }




      $data_ID_card_care = $request->ID_Card_care;

        $data_ID_card_care_all='';
        //$iCount = count($data_ID_card_cus);
        for ($i=0; $i < count($data_ID_card_care) ; $i++) {
          if(($i+1)===count($data_ID_card_care)){
            $data_ID_card_care_all .= $data_ID_card_care[$i];
              $caregiver->id_card_care =$data_ID_card_care_all;
          }
          else{
              $data_ID_card_care_all .= $data_ID_card_care[$i]."-";
          }

        }


        $caregiver ->address_care = $request->Address_care;
        $caregiver ->caregiver_status ='not_work';


        $caregiver->id_user_caregivers= $User_caregiver->id;





        $caregiver ->save();
        //Session::put('id_caregivers',$caregiver->id);

        $caregiver_detail = new caregiver_detail;
        $caregiver_detail->year_of_caregiver = $request->Year_of_Caregiver;
        $caregiver_detail->edu_caregiver = $request->Edu_Caregiver;
        $caregiver_detail->type_of_living = $request->Type_of_living;
        $caregiver_detail->rest_day = $request->Rest_day;
        $caregiver_detail->id_caregivers= $caregiver->id;

        $caregiver_detail ->save();

        $s_s = $request->Special_skill;
        for ($i=0; $i < count($s_s) ; $i++) {
          # code...
            $s_skill = new Caregiver_skill;
            $s_skill->id_caregivers = $caregiver->id;
            $s_skill->id_special_skills = $s_s[$i];
            $s_skill->save();
        }//Caregiver_skill

        $medi_equip = $request->Medical_equipment;
        for ($i=0; $i < count($medi_equip) ; $i++) {
          # code...
            $Medical_equipment = new Caregiver_Equipment;
            $Medical_equipment->id_caregivers = $caregiver->id;
            $Medical_equipment->id_medical_equipments = $medi_equip[$i];
            $Medical_equipment->save();
        }//Caregiver_skill


        return redirect('caregiver');
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
