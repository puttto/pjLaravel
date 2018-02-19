@extends('layouts\main')
@section('content')

  <div class="container" style="padding-top:80px;">
    {{-- <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul> --}}
      <h1>ข้อมูลส่วนตัวผู้ป่วย</h1>
      <h2>กรุณากรอกข้อมูล</h2>
      {{-- <span>{{Session::get('customer_id')}}</span> --}}
@foreach ($pat as $test)


      {{Form::open(['method'=>'put','route'=>['updatepat.update',$test->id_patients]])}}
      {{-- {{Form::open(['url'=>'updatesick'])}} --}}
       {{-- ส่งข้อมูลข้ามหน้า ไม่มีข้อมูล --}}


        <div class="form-group" style="padding-top:50px;">
          {{-- <label for="gender">เพศ:</label> --}}
          {{Form::label('gander','เพศ:')}}
          <select name="gender" class="form-control" id="gender">
            @if ($test->gender_Pat=='ช')
              <option value="ช" checked >ชาย</option>
              <option value="ญ" >หญฺิง</option>
              @else
                <option value="ช"  >ชาย</option>
                <option value="ญ" checked>หญฺิง</option>
            @endif

             </select>
        </div>


        <div class="form-group {{ $errors->has('Name_pat') ? ' has-error' : '' }} ">
          <label for="name">ชื่อ:</label>
          {{-- {{Form::label('name','ชื่อ:')}} --}}
          <input value="{{$test->name_Pat}}" type="text" class="form-control" id="Name_pat" name="Name_pat" required autofocus>
          {{-- {{Form::text('Name_pat','',['class'=>'form-control','id'=>'Name_pat','placeholder'=>'ชื่อ'])}} --}}
          @if ($errors->has('Name_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Name_pat') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Lastname_pat') ? ' has-error' : '' }}">
          <label for="lastname">นามสกุล:</label>
          <input value="{{$test->lastname_Pat}}" type="text" class="form-control" id="Lastname_pat" name="Lastname_pat" required autofocus>
          @if ($errors->has('Lastname_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lastname_pat') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Name_pat_e') ? ' has-error' : '' }} ">
          <label for="name">Name:</label>

          {{-- <input  type="text" class="form-control" id="Name_pat_e" name="Name_pat_e" required autofocus>

          @if ($errors->has('Name_pat_e'))
              <span class="help-block">
                  <strong>{{ $errors->first('Name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Lastname_pat_e') ? ' has-error' : '' }}">
          <label for="lastname">Lastname:</label>
          <input type="text" class="form-control" id="Lastname_pat_e" name="Lastname_pat_e" required autofocus>
          @if ($errors->has('Lastname_pat_e'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lastname') }}</strong>
              </span>
          @endif
        </div> --}}

        <div class="form-group {{ $errors->has('Nickname_pat') ? ' has-error' : '' }}">
          <label for="nickname">ชื่อเล่น:</label>
          <input value="{{$test->nickname_Pat}}" type="text" class="form-control" id="Nickname_pat" name="Nickname_pat" required autofocus>
          @if ($errors->has('Nickname_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nickname_pat') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('Birthday') ? ' has-error' : '' }}">
          <label for="Birthday">วัน-เดือน-ปีเกิด:</label>
          <input value="{{$test->birthday_Pat}}" type="text" class="form-control" data-field="date" readonly id="Birthday" name="Birthday" required autofocus>
          @if ($errors->has('Birthday'))
              <span class="help-block">
                  <strong>{{ $errors->first('Birthday') }}</strong>
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

        <div class="form-group {{ $errors->has('Weight') ? ' has-error' : '' }}">
          <label for="Weight">น้ำหนัก:</label>
          <input value="{{$test->weight_Pat}}" type="number" min="1"  class="form-control" id="Weight" name="Weight" required autofocus>
          @if ($errors->has('Weight'))
              <span class="help-block">
                  <strong>{{ $errors->first('Weight') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Hight') ? ' has-error' : '' }}">
          <label for="Hight">ส่วนสูง:</label>
          <input value="{{$test->hight_Pat}}" type="number" min="1" class="form-control" id="Hight" name="Hight" required autofocus>
          @if ($errors->has('Hight'))
              <span class="help-block">
                  <strong>{{ $errors->first('Hight') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('Nationality') ? ' has-error' : '' }}" >
          <label for="Nationality">สัญชาติ:</label>
          <input value="{{$test->nationality_Pat}}" type="text" class="form-control" id="Nationality" name="Nationality" required autofocus>
          @if ($errors->has('Nationality'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nationality') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Race') ? ' has-error' : '' }}">
          <label for="Race">เชื้อชาติ:</label>
          <input value="{{$test->race_Pat}}" type="text" class="form-control" id="Race" name="Race" required autofocus>
          @if ($errors->has('Race'))
              <span class="help-block">
                  <strong>{{ $errors->first('Race') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Religion') ? ' has-error' : '' }}">
          <label for="Religion">ศาสนา:</label>
          <input value="{{$test->religion_Pat}}" type="text" class="form-control" id="Religion" name="Religion" required autofocus>
          @if ($errors->has('Religion'))
              <span class="help-block">
                  <strong>{{ $errors->first('Religion') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('ID_Card_pat') ? ' has-error' : '' }}">
          <label for="id_card">เลขประจำตัวประชาชน:</label>
          <div class="container row">

            <input value="{{substr($test->id_card_Pat,0,1)}}" type="text" class="form-control" id="ID_card_cus_1" name="ID_Card_pat[]" size="1" maxlength="1" style="width:23px;" required autofocus>
            &nbsp;
            <input value="{{substr($test->id_card_Pat,2,4)}}" type="text" class="form-control" id="ID_card_cus_2" name="ID_Card_pat[]" size="3" maxlength="4" style="width:45px;" required autofocus>
            &nbsp;
            <input value="{{substr($test->id_card_Pat,7,5)}}" type="text" class="form-control" id="ID_card_cus_3" name="ID_Card_pat[]" size="4" maxlength="5" style="width:50px;" required autofocus>
            &nbsp;
            <input value="{{substr($test->id_card_Pat,13,2)}}" type="text" class="form-control" id="ID_card_cus_4" name="ID_Card_pat[]" size="1" maxlength="2" style="width:32px;" required autofocus>
            &nbsp;
            <input value="{{substr($test->id_card_Pat,16,1)}}" type="text" class="form-control" id="ID_card_cus_5" name="ID_Card_pat[]" size="1" maxlength="1" style="width:23px;" required autofocus>
          </div>


          @if ($errors->has('ID_Card_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('ID_Card_pat') }}</strong>
              </span>
          @endif
        </div>

        <script type="text/javascript">
                $(function(){
        /*  สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
          $("input[id^='ID_Card_pat_']").keyup(function(event){
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


        <div class="form-group {{ $errors->has('interesting') ? ' has-error' : '' }}">
          <label for="interesting">ความชอบ:</label>
          <!-- <input type="text" class="form-control" id="interesting"> -->
          <textarea   class="form-control" rows="5" id="interesting" name="interesting" required autofocus>{{$test->interesting_Pat}}</textarea>
          @if ($errors->has('interesting'))
              <span class="help-block">
                  <strong>{{ $errors->first('interesting') }}</strong>
              </span>
          @endif

        </div>

        <div class="form-group {{ $errors->has('Hospital') ? ' has-error' : '' }}">
          <label for="hospital_lb">ข้อมูลเกี่ยวกับโรงพยาบาล:</label>
          <textarea class="form-control" rows="5" id="Hospital" name="Hospital" required autofocus>{{$test->hospital_pat}}</textarea>
          @if ($errors->has('Hospital'))
              <span class="help-block">
                  <strong>{{ $errors->first('Hospital') }}</strong>
              </span>
          @endif

        </div>


        <div class="button" style="text-align:right;">
  <button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
        </div>
      {{-- {{Form::close()}} --}}
      {{Form::close()}}
@endforeach
      {{-- @forelse ($Patient as $data)
        <ul>
          <li>{{$data ['Name_Pat']}}</li>
          <li>{{$data ['Lastname_Pat']}}</li>
          <li>{{$data ['Nickname_pat']}}</li>
        </ul>
      @empty
        <h1>no data!!</h1>
      @endforelse --}}



    </div>

@endsection
