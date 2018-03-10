@extends('layouts/main_care')
@section('content')
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
  <div class="content-wrapper">
    <div class="container">
      <div class="row mb-2 ">
           <div class="col-lg-12">
      <div class="card px-4">
        <div class="card-body">
        <h3 class="page-heading mb-4">แจ้งฉุกเฉิน</h3>
        {{Form::open(['url'=>'authcare/emergency'])}}
        <div class="form-group">

          <div class="form-group">
            <label for="accident_lb">อุบัติเหตุ</label>
            <select class="form-control p-input" name='message'>
              <option value="ลื้นล้ม">ลื้นล้ม</option>
              <option value="ไฟไหม้น้ำร้อนลวก">ไฟไหม้น้ำร้อนลวก</option>
              <option value="สำลักอาหาร">สำลักอาหาร</option>
              <option value="อ่อนแรงอัมพาต">อ่อนแรงอัมพาต</option>
              <option value="หัวใจล้มเหลว">หัวใจล้มเหลว</option>
            </select>
          </div>
        </div>
        <br><br><br>
        <div class="form-group text-right">

          <button type="submit" class="btn btn-primary btn-sm">
           แจ้งศูนย์
          </button>

          </div>
          <br><br><br><br>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
              <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                {{-- <ol class="nav-item active"> --}}
                @foreach ($customer as $show)
                  <a class="nav-link" href="tel:{{$show['mobilephone_cus']}}">
                    <img width="80px" src="../img/icon/contact.png" alt="">
                    {{-- <i class="fa fa-2x fa-list-ol text-primary mb-3 sr-icons"></i> --}}
                  <br /><br />  <h6 class="menu-title">โทรหาลูกค้า</h6>
                     <h6 class="menu-title">คุณ
                       {{$show['name_cus'] }}&nbsp;&nbsp;{{$show['lastname_cus'] }}&nbsp;
                     @endforeach</h6>

                  </a>
                {{-- </ol> --}}
                {{-- <a clsss="  ">  <img width="40px" src="../img/icon/vitalsign.png" alt=""></a> --}}
                {{-- <a clsss="  " style="font-size: 16px; " href="tel:+66614844107"> โทร 061-4844107</a> --}}
              </div>
              <div class=" col-xl-6 col-lg-6 col-md-6 col-sm-6" style="text-align:center">
                {{-- <ol class="nav-item active"> --}}
                  <a class="nav-link" href="tel:1669">
                    <img width="80px" src="../img/icon/emergency.png" alt="">
                    {{-- <i class="fa fa-2x fa-list-ol text-primary mb-3 sr-icons"></i> --}}

                    <br /><br /><h6 class="menu-title" style="color:#f05f40">เรียกรถพยาบาล 1669</h6>
                  </a>
                {{-- </ol> --}}
                {{-- <a clsss="  ">  <img width="40px" src="../img/icon/vitalsign.png" alt=""></a> --}}
                {{-- <a clsss="  " style="font-size: 16px; " href="tel:+66614844107"> โทร 061-4844107</a> --}}
              </div>
            </div>
          </div>

        {{Form::close()}}
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
@endsection
