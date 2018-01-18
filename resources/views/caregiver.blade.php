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


        <div class="form-group">
          <label for="name_lb">ชื่อ:</label>
          <input type="text" class="form-control" id="Name_care" name="Name_care">
        </div>
        <div class="form-group">
          <label for="lastname_lb">นามสกุล:</label>
          <input type="text" class="form-control" id="Lastname_care" name="Lastname_care">
        </div>
        <div class="form-group">
          <label for="nickname_lb">ชื่อเล่น:</label>
          <input type="text" class="form-control" id="Nickname_care" name="Nickname_care">
        </div>
        <div class="form-group">
          <label for="Birthday_lb">วัน-เดือน-ปีเกิด:</label>
          <input type="text" class="form-control" data-field="date" readonly id="Birthday_care" name="Birthday_care">
        </div>
        <!-- <input type="text" data-field="date" readonly> -->
        <div id="dtBox" ></div>
        <script type="text/javascript">
          $(document).ready(function() {

             $("#dtBox").DateTimePicker();




          });
        </script>
        <div class="form-group">
          <label for="Weight_lb">น้ำหนัก:</label>
          <input type="number" class="form-control" id="Weight_care" name="Weight_care">
        </div>
        <div class="form-group">
          <label for="Hight_lb">ส่วนสูง:</label>
          <input type="number" class="form-control" id="Hight_care" name="Hight_care">
        </div>
        <div class="form-group">
          <label for="Nationality_lb">สัญชาติ:</label>
          <input type="text" class="form-control" id="Nationality_care" name="Nationality_care">
        </div>
        <div class="form-group">
          <label for="Race_lb">เชื้อชาติ:</label>
          <input type="text" class="form-control" id="Race_care" name="Race_care">
        </div>
        <div class="form-group">
          <label for="Religion_lb">ศาสนา:</label>
          <input type="text" class="form-control" id="Religion_care" name="Religion_care">
        </div>
        <div class="form-group">
          <label for="id_card_lb">เลขประจำตัวประชาชน:</label>
          <input type="text" class="form-control" id="ID_Card_care" name="ID_Card_care">
        </div>
        <div class="form-group">
          <label for="Address_lb">ที่อยู่:</label>
          <!-- <input type="text" class="form-control" id="Address_care"> -->
          <textarea class="form-control" rows="5" id="Address_care" name="Address_care"></textarea>
        </div>
        <div class="form-group">
          <label for="Mobilephone_lb">เบอร์โทรศัพท์มือถือ:</label>
          <input type="text" class="form-control" id="Mobilephone_care" name="Mobilephone_care">
        </div>
        <div class="form-group">
          <label for="Lineid_lb">ID-Lind:</label>
          <input type="text" class="form-control" id="Lineid" name="Lineid">
        </div>
        <div class="form-group">
          <label for="Email_lb">Email:</label>
          <input type="text" class="form-control" id="Email" name="Email">
        </div>
        <div class="form-group">
  <label for="password_lb">Password:</label>
  <input type="password" class="form-control" id="Password" name="Password">
</div>
<div class="form-group">
  <label for="confirmpassword_lb">Password:</label>
  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">
</div>
<div class="form-group">
  <label for="Year_of_Caregiver_lb">จำนวนปีที่เป็นผู้ดูแล:</label>
  <input type="number" id="Year_of_Caregiver" class="form-control floating-label" name="Year_of_Caregiver">
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

<div class="form-group">
  <label for="special_skill_lb">เคสพิเศษที่เคยดูแล</label>
<select class="form-control selectpicker" data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="Special_skill[]" >

@forelse ($special__skills as $data)
  <option value="{{$data['id_special__skills']}}">{{$data['special_skill_descption']}}</option>

@empty
  <option value="0">no data!</option>

@endforelse

      </select>
      {{-- @forelse ($special_skill as $data)
        <ul>
          <li>{{$data ['id_special__skills']}}</li>
          <li>{{$data ['special_skill_descption']}}</li>

        </ul>
      @empty
        <h1>no data!!</h1>
      @endforelse --}}
</div>
<br>
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



<div class="button" style="text-align:right;">
<button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
</div>
      {{Form::close()}}

</div>

<br>


<br>

@endsection
