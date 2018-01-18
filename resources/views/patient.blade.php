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
      {{Form::open(['url'=>'sickness'])}}
       {{-- ส่งข้อมูลข้ามหน้า ไม่มีข้อมูล --}}


        <div class="form-group" style="padding-top:50px;">
          {{-- <label for="gender">เพศ:</label> --}}
          {{Form::label('gander','เพศ:')}}
          <select name="gender" class="form-control" id="gender">
            {{-- {{Form::select('gender',"['ช'=>'ชาย','ญ'=>'หญิง']",['class'=>'form-control'])}} --}}
              // <option value="ช" >ชาย</option>
              // <option value="ญ" >หญฺิง</option>
            // </select>
        </div>


        <div class="form-group {{ $errors->has('Name_pat') ? ' has-error' : '' }} ">
          <label for="name">ชื่อ:</label>
          {{-- {{Form::label('name','ชื่อ:')}} --}}
          <input type="text" class="form-control" id="Name_pat" name="Name_pat" required autofocus>
          {{-- {{Form::text('Name_pat','',['class'=>'form-control','id'=>'Name_pat','placeholder'=>'ชื่อ'])}} --}}
          @if ($errors->has('Name_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Name_pat') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Lastname_pat') ? ' has-error' : '' }}">
          <label for="lastname">นามสกุล:</label>
          <input type="text" class="form-control" id="Lastname_pat" name="Lastname_pat" required autofocus>
          @if ($errors->has('Lastname_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lastname_pat') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Nickname_pat') ? ' has-error' : '' }}">
          <label for="nickname">ชื่อเล่น:</label>
          <input type="text" class="form-control" id="Nickname_pat" name="Nickname_pat" required autofocus>
          @if ($errors->has('Nickname_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nickname_pat') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Nationality') ? ' has-error' : '' }}" >
          <label for="Nationality">สัญชาติ:</label>
          <input type="text" class="form-control" id="Nationality" name="Nationality" required autofocus>
          @if ($errors->has('Nationality'))
              <span class="help-block">
                  <strong>{{ $errors->first('Nationality') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Race') ? ' has-error' : '' }}">
          <label for="Race">เชื้อชาติ:</label>
          <input type="text" class="form-control" id="Race" name="Race" required autofocus>
          @if ($errors->has('Race'))
              <span class="help-block">
                  <strong>{{ $errors->first('Race') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Religion') ? ' has-error' : '' }}">
          <label for="Religion">ศาสนา:</label>
          <input type="text" class="form-control" id="Religion" name="Religion" required autofocus>
          @if ($errors->has('Religion'))
              <span class="help-block">
                  <strong>{{ $errors->first('Religion') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('ID_Card_pat') ? ' has-error' : '' }}">
          <label for="id_card">เลขประจำตัวประชาชน:</label>
          <input type="text" class="form-control" id="ID_Card_pat" name="ID_Card_pat"required autofocus>
          @if ($errors->has('ID_Card_pat'))
              <span class="help-block">
                  <strong>{{ $errors->first('ID_Card_pat') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('Birthday') ? ' has-error' : '' }}">
          <label for="Birthday">วัน-เดือน-ปีเกิด:</label>
          <input type="text" class="form-control" data-field="date" readonly id="Birthday" name="Birthday" required autofocus>
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
          <input type="number" onkeyup="NumChk()" class="form-control" id="Weight" name="Weight" required autofocus>
          @if ($errors->has('Weight'))
              <span class="help-block">
                  <strong>{{ $errors->first('Weight') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Hight') ? ' has-error' : '' }}">
          <label for="Hight">ส่วนสูง:</label>
          <input type="number" onkeyup="NumChk()" class="form-control" id="Hight" name="Hight" required autofocus>
          @if ($errors->has('Hight'))
              <span class="help-block">
                  <strong>{{ $errors->first('Hight') }}</strong>
              </span>
          @endif
        </div>

        <script>
        function NumChk() {
          var number = document.getElementById("num").value;
            if (number < 0) {
               document.getElementById("num").value = "";
          }
            }
        </script>

        <div class="form-group {{ $errors->has('interesting') ? ' has-error' : '' }}">
          <label for="interesting">ความชอบ:</label>
          <!-- <input type="text" class="form-control" id="interesting"> -->
          <textarea class="form-control" rows="5" id="interesting" name="interesting" required autofocus></textarea>
          @if ($errors->has('interesting'))
              <span class="help-block">
                  <strong>{{ $errors->first('interesting') }}</strong>
              </span>
          @endif

        </div>
        <div class="button" style="text-align:right;">
  <button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
        </div>
      {{Form::close()}}

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