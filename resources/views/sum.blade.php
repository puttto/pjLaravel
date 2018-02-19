@extends('layouts/main')
@section('content')

  <div class="container" style="padding-top:80px">

    @forelse ($pat as $data)
      {{-- {{dd($data)}} --}}

      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
           {{-- <A href="edit.html" >Edit Profile</A>

        <A href="edit.html" >Logout</A> --}}


      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

          <div class="panel panel-info">
            <div class="panel-heading">
              <h2 class="panel-title" style="font-size:20px">{{$data['name_Pat']}} {{$data['lastname_Pat']}} &nbsp;&nbsp; ({{$data['nickname_Pat']}})</h2>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                  {{-- <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> --}}
                  <img alt="User Pic" src="img/testt.png" class="img-circle img-responsive">
                 </div>

                <!--div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class="col-md-9 col-lg-9 col-xs-9">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>

                      </tr>
                      <tr>
                      <td>
                        เลขประจำตัวประชาชน:
                      </td>
                      <td>{{$data['id_card_Pat']}}</td>
                    </tr>
                      <tr>
                        <td>เพศ:</td>
                        @if ($data['gender_Pat'] == 'ญ')
                            <td>{{'หญิง'}}</td>
                          @else
                            <td>{{'ชาย'}}</td>
                        @endif

                      </tr>

                      <tr>
                        <td>เกิดวันที่:</td>
                        <td>{{$data['birthday_Pat']}}</td>
                      </tr>
                      <tr>
                        <td>อายุ</td>
                        <td>

                          @foreach ($show_age as $show )
                            {{$show}}
                        @endforeach
                      </td>
                    </tr>
                      <tr>
                        <td>สัญชาติ:</td>
                        <td>{{$data['nationality_Pat']}}</td>
                      </tr>
                      <tr>
                        <td>เชื้อชาติ:</td>
                        <td>{{$data['race_Pat']}}</td>
                      </tr>
                      <tr>
                        <td>ศาสนา:</td>
                        <td>{{$data['religion_Pat']}}</td>
                      </tr>

                      <tr>
                        <td>น้ำหนัก:</td>
                        <td>{{$data['weight_Pat']}} กก</td>
                      </tr>
                      <tr>
                        <td>ส่วนสูง:</td>
                        <td>{{$data['hight_Pat']}} ซม</td>
                      </tr>

                      <tr>
                        <td>สิ่งที่ชอบ:</td>
                        <td>{{$data['interesting_Pat']}}</td>
                      </tr>

                      <tr>
                        <td>ข้อมูลโรงพยาบาล</td>
                        <td>{{$data['hospital_pat']}}</td>
                      </tr>

                    </tbody>


                  </table>
</div>
                  {{-- <a href="#" class="btn btn-info">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a> --}}
                  <div class="col-md-12 col-lg-12 col-xs-12">
                    <table class="table table-user-information">

                      <tr>
                        <br>
                      </tr>

                      <tbody>
                        <tr>
                          <td width="30%">โรคที่ป่วย</td>
                          <td width="70%">
                            @foreach ($show_patsick as $data ) &nbsp;&nbsp;{{$data['sick_description']}}<br> @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td width="30%">อุปกรณ์ติดตัวคนไข้</td>
                          <td width="70%">
                            @foreach ($show_equipment as $data ) &nbsp;&nbsp;{{$data['equipment_description']}}<br> @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td width="30%">แพ้อาหารและยา</td>
                          <td width="70%">
                            @foreach ($show_allergy as $data ) &nbsp;&nbsp;{{$data['allergy_description']}}<br> @endforeach
                          </td>
                        </tr>
                        <tr>
                          <td width="30%"></td>
                          <td width="70%"></td>
                        </tr>
                      </tbody>
                  </table>

                </div>

            </div>
                 <div class="panel-footer" style="text-align:right;">

                   {{-- <a type="button" class="btn btn-sm btn-primary">ยืนยันข้อมูล</a> --}}

                   {{Html::link('updatepat/'.$data['id_patients'].'/edit','แก้ไขข้อมูล',array('class'=>'btn btn-warning'))}}
                   {{Html::link('/index','ยืนยันข้อมูล',array('class'=>'btn btn-info'))}}
                        {{-- <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span> --}}
                    </div>

          </div>
        </div>
      </div>
    </div>

    @empty

    @endforelse



@endsection
