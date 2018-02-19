  @extends('layouts\main')
   @section('content')
     <div class="container">
       <ul>
         @foreach ($errors->all() as $error)
           <li>{{$error}}</li>
         @endforeach
       </ul>
       <div class="container" style="padding-top:80px;">
      {{Form::open(['url'=>'patient'])}}



        <div class="form-group {{ $errors->has('Name') ? ' has-error' : '' }} " >
          <label for="name_lb">ชื่อ:</label>
          <input type="text" class="form-control" id="Name" name="Name" required autofocus>
          @if ($errors->has('Name'))
              <span class="help-block">
                  <strong>{{ $errors->first('Name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Lastname') ? ' has-error' : '' }}">
          <label for="lastname_lb">นามสกุล:</label>
          <input type="text" class="form-control" id="Lastname" name="Lastname" required autofocus>
          @if ($errors->has('Lastname'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lastname') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group" {{ $errors->has('Address') ? ' has-error' : '' }}>
          <label for="Address_lb">ที่อยู่:</label>
          <input type="text" class="form-control" id="Address" name="Address" required autofocus>
          @if ($errors->has('Address'))
              <span class="help-block">
                  <strong>{{ $errors->first('Address') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('Telephone') ? ' has-error' : '' }}">
          <label for="Telephone_lb">เบอร์โทรศัพท์บ้าน:</label>
          <input type="text" class="form-control" id="Telephone" name="Telephone" required autofocus>
          @if ($errors->has('Telephone'))
              <span class="help-block">
                  <strong>{{ $errors->first('Telephone') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group {{ $errors->has('Mobilephone') ? ' has-error' : '' }}">
          <label for="Mobilephone_lb">เบอร์โทรศัพท์มือถือ:</label>
          <input type="text" class="form-control" id="Mobilephone" name="Mobilephone"  required autofocus>
          @if ($errors->has('Mobilephone'))
              <span class="help-block">
                  <strong>{{ $errors->first('Mobilephone') }}</strong>
              </span>
          @endif
        </div>

        <div class="form-group  {{ $errors->has('Lineid') ? ' has-error' : '' }}">
          <label for="Lineid_lb">ID-Lind:</label>
          <input type="text" class="form-control" id="Lineid" name="Lineid" required autofocus>
          @if ($errors->has('Lineid'))
              <span class="help-block">
                  <strong>{{ $errors->first('Lineid') }}</strong>
              </span>
          @endif
        </div>





        <div class="form-group {{ $errors->has('ID_card_cus') ? ' has-error' : '' }}">
          <label for="ID_card_cus_lb">เลขประจำตัวประชาชน ผู้สมัคร:</label>
            <div class="container row">
              <input type="text" class="form-control" id="ID_card_cus_1" name="ID_card_cus[]" size="1" maxlength="1" style="width:23px;" required autofocus>
              &nbsp;
              <input type="text" class="form-control" id="ID_card_cus_2" name="ID_card_cus[]" size="3" maxlength="4" style="width:45px;" required autofocus>
              &nbsp;
              <input type="text" class="form-control" id="ID_card_cus_3" name="ID_card_cus[]" size="4" maxlength="5" style="width:50px;" required autofocus>
              &nbsp;
              <input type="text" class="form-control" id="ID_card_cus_4" name="ID_card_cus[]" size="1" maxlength="2" style="width:32px;" required autofocus>
              &nbsp;
              <input type="text" class="form-control" id="ID_card_cus_5" name="ID_card_cus[]" size="1" maxlength="1" style="width:23px;" required autofocus>
            </div>
          @if ($errors->has('ID_card_cus'))
              <span class="help-block">
                  <strong>{{ $errors->first('ID_card_cus') }}</strong>
              </span>
          @endif
        </div>

        <script type="text/javascript">
                $(function(){
        /*  สามารถเปลี่ยนจาก citizen_ เป็นค่าที่ต้องการ  */
          $("input[id^='ID_card_cus_']").keyup(function(event){
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


        <div class="form-group {{ $errors->has('Email') ? ' has-error' : '' }}">
          <label for="Email_lb">Email ที่ใช้สมัคร</label>
          <input type="text" class="form-control" id="Email" name="Email" required autofocus>
          @if ($errors->has('Email'))
              <span class="help-block">
                  <strong>{{ $errors->first('Email') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-md-4 control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>



        <br><br>
        <div class="button" style="text-align:right;">
          <button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
        </div>


      {{Form::close()}}
    </div>
   @endsection
