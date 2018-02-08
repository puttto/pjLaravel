 @extends('layouts/main_dash')
 @section('content')


<!-- partial -->


<!-- partial -->
<div class="content-wrapper">

  {{Form::open(['url'=>'search'])}}
   @forelse ($detail as $data)
   {{-- {{dd($data)}} --}}


  <div class="container">

    <div class="row">
      <div class="col-md-3  toppad  pull-right col-md-offset-3 ">

      </div>
      <div class="row col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
        <div class="card">
          <div class="card-header text-white" style="background-color:#f05f40;">
            <h2 class="" style="font-size:25px">{{$data['name_Pat']}} {{$data['lastname_Pat']}} &nbsp;&nbsp; ({{$data['nickname_Pat']}})</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 rounded-circle " align="center">
                {{-- <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> --}}
                <img alt="User Pic" src={{asset( '../img/testt.png')}} class="img-circle img-responsive">
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
                      <td>เพศ: </td>
                      @if ($data['gender_Pat'] == 'ญ')
                      <td>{{'หญิง'}}</td>
                      @else
                      <td>{{'ชาย'}}</td>
                      @endif
                    </tr>
                    {{-- <tr>
                      <td>ชื่อเล่น:</td>
                      <td>{{$data['nickname_Pat']}}</td>
                    </tr> --}}
                    <tr>
                      <td>เกิดวันที่:</td>
                      <td>{{$data['birthday_Pat']}}</td>
                    </tr>
                    <tr>
                      <td>อายุ</td>
                      <td>
                        @foreach ($show_age as $age )
                        {{$age}}
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
                  </tbody>
                </table>

                {{-- <a href="#" class="btn btn-info">My Sales Performance</a>
                <a href="#" class="btn btn-primary">Team Sales Performance</a> --}}


              </div>
              <br>

              <div class="col-md-12 col-lg-12 col-xs-12">
                <table class="table table-user-information">
                  {{--
                  <thead>
                    <tr>
                      <th></th>
                      <th>โรคที่ป่วย</th>
                    </tr>
                  </thead> --}}

                  <tr>
                    <br>
                  </tr>

                  <tbody>
                    <tr>
                      <td width="30%">โรคที่ป่วย</td>
                      <td width="70%">
                        @foreach ($show_patsick as $data2 ) &nbsp;&nbsp;{{$data2['sick_description']}}<br> @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">อุปกรณ์ติดตัวคนไข้</td>
                      <td width="70%">
                        @foreach ($show_equpment as $data2 ) &nbsp;&nbsp;{{$data2['equipment_description']}}<br> @endforeach
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">แพ้อาหารและยา</td>
                      <td width="70%">
                        @foreach ($show_allergy as $data2 ) &nbsp;&nbsp;{{$data2['allergy_description']}}<br> @endforeach
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
          </div>

          <div class="card-footer" style="color-background:white; text-align:right;">
            {{-- <button type="submit" class="btn btn-primary">
                         ค้นหาผู้ดูแล
                       </button> --}} {{Html::link('search/'.$data['id_patients'],'ค้นหาผู้ดูแล',array('class'=>'btn btn-primary'))}} {{-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
            <span class="pull-right">
                                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                            </span> --}}
          </div>
        </div>
      </div>



    </div>

  </div>

</div>
@empty
@endforelse
@endsection
