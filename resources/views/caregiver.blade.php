@extends('layouts\main')
@section('content')
  <div class="container" style="padding-top : 60px;">

    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
      <h2>ข้อมูลส่วนตัวผู้ดูแล</h2>
      <p>กรุณากรอกข้อมูล</p>
      {{Form::open(['url'=>'caregiver'])}}

        <div class="form-group">
          <label for="gender_lb">เพศ:</label>
          <select  class="form-control" id="Gender_care" name="Gender_care">
              <option value="ช" >ชาย</option>
              <option value="ญ" >หญฺิง</option>
            </select>
        </div>


        <div class="form-group {{ $errors->has('Name_care') ? ' has-error' : '' }}">
          <label for="name_lb">ชื่อ:</label>
          <input type="text" class="form-control" id="Name_care" name="Name_care" required autofocus>
          @if ($errors->has('Name_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Name_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group  {{ $errors->has('Lastname_care') ? ' has-error' : '' }}">
          <label for="lastname_lb">นามสกุล:</label>
          <input type="text" class="form-control" id="Lastname_care" name="Lastname_care" required autofocus>
          @if ($errors->has('Lastname_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lastname_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group  {{ $errors->has('Nickname_care') ? ' has-error' : '' }}">
          <label for="nickname_lb">ชื่อเล่น:</label>
          <input type="text" class="form-control" id="Nickname_care" name="Nickname_care" required autofocus>
          @if ($errors->has('Nickname_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nickname_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Birthday_care') ? ' has-error' : '' }} ">

          <label for="Birthday_lb">วัน-เดือน-ปีเกิด:</label>
          <input type="text" class="form-control" data-field="date" readonly id="Birthday_care" name="Birthday_care" required autofocus>
          @if ($errors->has('Birthday_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Birthday_care') }}</strong>
              </span>
          @endif
        </div>
        <!-- <input type="text" data-field="date" readonly> -->
        <div id="dtBox" ></div>
        <script type="text/javascript">
          $(document).ready(function() {

             $("#dtBox").DateTimePicker();




          });
        </script>
        <div class="form-group {{ $errors->has('Weight_care') ? ' has-error' : '' }}">
          <label for="Weight_lb">น้ำหนัก:</label>
          <input type="number" min="1"class="form-control" id="Weight_care" name="Weight_care" required autofocus>
          @if ($errors->has('Weight_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Weight_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Hight_care') ? ' has-error' : '' }}">
          <label for="Hight_lb">ส่วนสูง:</label>
          <input type="number" min="1" class="form-control" id="Hight_care" name="Hight_care" required autofocus>
          @if ($errors->has('Hight_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Hight_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Hight_care') ? ' has-error' : '' }}">
          <label for="Nationality_lb">สัญชาติ:</label>
          <input type="text" class="form-control" id="Nationality_care" name="Nationality_care" required autofocus>
          @if ($errors->has('Nationality_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nationality_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Race_care') ? ' has-error' : '' }}">
          <label for="Race_lb">เชื้อชาติ:</label>
          <input type="text" class="form-control" id="Race_care" name="Race_care" required autofocus>
          @if ($errors->has('Race_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Race_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <label for="Religion_lb">ศาสนา:</label>
          <input type="text" class="form-control" id="Religion_care" name="Religion_care" required autofocus>
          @if ($errors->has('Religion_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Religion_care') }}</strong>
              </span>
          @endif

        </div>



          <div class="form-group {{ $errors->has('ID_Card_care') ? ' has-error' : '' }}">
            <label for="ID_Card_care_lb">เลขประจำตัวประชาชน ผู้สมัคร:</label>
              <div class="container row">
                <input type="text" class="form-control" id="ID_Card_care_1" name="ID_Card_care[]" size="1" maxlength="1" style="width:23px;" required autofocus>
                &nbsp;
                <input type="text" class="form-control" id="ID_Card_care_2" name="ID_Card_care[]" size="3" maxlength="4" style="width:45px;" required autofocus>
                &nbsp;
                <input type="text" class="form-control" id="ID_Card_care_3" name="ID_Card_care[]" size="4" maxlength="5" style="width:50px;" required autofocus>
                &nbsp;
                <input type="text" class="form-control" id="ID_Card_care_4" name="ID_Card_care[]" size="1" maxlength="2" style="width:32px;" required autofocus>
                &nbsp;
                <input type="text" class="form-control" id="ID_Card_care_5" name="ID_Card_care[]" size="1" maxlength="1" style="width:23px;" required autofocus>
              </div>
            @if ($errors->has('ID_Card_care'))
                <span class="help-block">
                    <strong>{{ $errors->first('ID_Card_care') }}</strong>
                </span>
            @endif
          </div>

          <script type="text/javascript">
                  $(function(){
          /*  สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
            $("input[id^='ID_Card_care']").keyup(function(event){
                if(event.keyCode==8){
                    if($(this).val().length==0){
                        $(this).prev("input").focus();
                    }
                    return false;
                }
                if($(this).val().length==$(this).attr("maxLength")){
                    $(this).next("input").focus();
                }
            });
          });
          </script>




        <div class="form-group {{ $errors->has('Address_care') ? ' has-error' : '' }}">
          <label for="Address_lb">ที่อยู่:</label>
          <!-- <input type="text" class="form-control" id="Address_care"> -->
          <textarea class="form-control" rows="5" id="Address_care" name="Address_care" required autofocus></textarea>
          @if ($errors->has('Address_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Address_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Mobilephone_care') ? ' has-error' : '' }}">
          <label for="Mobilephone_lb">เบอร์โทรศัพท์มือถือ:</label>
          <input type="text" class="form-control" id="Mobilephone_care" name="Mobilephone_care" required autofocus>
          @if ($errors->has('Mobilephone_care'))
              <span class="help-block">
                  <strong>{{ $errors->first('Mobilephone_care') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Lineid') ? ' has-error' : '' }}">
          <label for="Lineid_lb">ID-Lind:</label>
          <input type="text" class="form-control" id="Lineid" name="Lineid" required autofocus>
          @if ($errors->has('Lineid'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lineid') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Email') ? ' has-error' : '' }}">
          <label for="Email_lb">Email:ที่ใช้สมัคร</label>
          <input type="text" class="form-control" id="Email" name="Email" required autofocus>
          @if ($errors->has('Email'))
              <span class="help-block">
                  <strong>{{ $errors->first('Email') }}</strong>
              </span>
          @endif

        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
  <label for="password_lb">Password:</label>
  <input type="password" class="form-control" id="Password" name="Password" required autofocus>
  @if ($errors->has('password'))
      <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
  @endif
</div>
{{-- <div class="form-group">
  <label for="confirmpassword_lb">Password:</label>
  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
</div> --}}
<div class="form-group {{ $errors->has('Year_of_Caregiver') ? ' has-error' : '' }} ">
  <label for="Year_of_Caregiver_lb">จำนวนปีที่เป็นผู้ดูแล:</label>
  <input type="number" min="1" id="Year_of_Caregiver" class="form-control floating-label" name="Year_of_Caregiver" required autofocus>
  @if ($errors->has('Year_of_Caregiver'))
      <span class="help-block">
          <strong>{{ $errors->first('Year_of_Caregiver') }}</strong>
      </span>
  @endif
</div>
<div class="form-group">
  <label for="Edu_Caregiver_lb">ระดับการศึกษา</label>
  <select class="form-control" size="auto" name="Edu_Caregiver">
            <option value="1">ไม่มี</option>
            <option value="2">พนักงานผู้ช่วยพยาบาล (Nurse aided) </option>
            <option value="3">ผู้ช่วยพยาบาล (Practical nurse) </option>
            <option value="4">พยาบาล (Registered nurse)</option>
        </select>
</div>

<div class="form-group">
  <label for="type_of_living_lb">ระดับการศึกษา</label>
  <select class="form-control" size="auto" name="Type_of_living">
            <option value="1">พักที่บ้านนายจ้าง</option>
            <option value="2">เดินทางไป-กลับ</option>

        </select>
</div>
<br>
<div class="form-group">
  <label for="rest_day_lb">วันหยุดที่ต้องการ (หยุดได้ 1 วัน) </label>
  <div class="form-group">
    <input type="radio" id="1" name="Rest_day" value="1">
    <label for="Mon"> Mon</label>
    <input type="radio" id="2" name="Rest_day" value="2">
    <label for="Tue"> Tue</label>
    <input type="radio" id="3" name="Rest_day" value="3">
    <label for="Wed"> Wed</label>
    <input type="radio" id="4" name="Rest_day" value="4">
    <label for="Thu"> Thu</label>
    <input type="radio" id="5" name="Rest_day" value="5">
    <label for="Fri"> Fri</label>
    <input type="radio" id="6" name="Rest_day" value="6">
    <label for="Sat"> Sat</label>
    <input type="radio" id="7" name="Rest_day" value="7">
    <label for="Sun"> Sun</label>
  </div>
</div>
<br><br><br><br>
<div class="form-group">
  <label for="special_skill_lb">เคสพิเศษที่เคยดูแล</label>
<select class="form-control selectpicker" data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="Special_skill[]" >

@forelse ($special__skills as $data)
  <option value="{{$data['id_special_skills']}}">{{$data['special_skill_descption']}}</option>

@empty
  <option value="0">no data!</option>

@endforelse

      </select>
      {{-- @forelse ($special_skill as $data)
        <ul>
          <li>{{$data ['id_special_skills']}}</li>
          <li>{{$data ['special_skill_descption']}}</li>

        </ul>
      @empty
        <h1>no data!!</h1>
      @endforelse --}}
</div>
<br><br>
<div class="form-group">
  <label for="medical_equipment_lb">เครื่องมืออุปกรณ์การแพทย์ที่เคยใช้</label>
<select class="form-control selectpicker"   data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto"  name="Medical_equipment[]" >

          @forelse ($medical_equipments as $data)
               <option value="{{$data['id_medical_equipments']}}">{{$data['medical_equipment_description']}}</option>
          @empty
             <option value="0">no data!</option>
          @endforelse
      </select>
</div>
<br>


<br>
<br>
<br>



<div class="button" style="text-align:right;">
<button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
</div>
      {{Form::close()}}

</div>

<br>


<br>

@endsection
