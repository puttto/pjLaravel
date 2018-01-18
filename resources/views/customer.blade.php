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
        <div class="form-group {{ $errors->has('Telephone') ? ' has-error' : '' }}">
          <label for="Telephone_lb">เบอร์โทรศัพท์:</label>
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
        <div class="form-group" {{ $errors->has('Address') ? ' has-error' : '' }}>
          <label for="Address_lb">ที่อยู่:</label>
          <input type="text" class="form-control" id="Address" name="Address" required autofocus>
          @if ($errors->has('Address'))
              <span class="help-block">
                  <strong>{{ $errors->first('Address') }}</strong>
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
          <input type="text" class="form-control" id="ID_card_cus" name="ID_card_cus" required autofocus>
          @if ($errors->has('ID_card_cus'))
              <span class="help-block">
                  <strong>{{ $errors->first('ID_card_cus') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group {{ $errors->has('Email') ? ' has-error' : '' }}">
          <label for="Email_lb">Email:</label>
          <input type="text" class="form-control" id="Email" name="Email" required autofocus>
          @if ($errors->has('Email'))
              <span class="help-block">
                  <strong>{{ $errors->first('Email') }}</strong>
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
