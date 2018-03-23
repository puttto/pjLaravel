@extends('layouts/main_care')
@section('content')
  <?php
  use Carbon\Carbon;
  ?>
  <style media="screen">
  .text-display-box {
  /* max-width: 140px; */
  height: 40px;
  color: #282828;
  border: 1px solid #ccc;
  padding: 10px;
  background-color: #f9f9f9;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  border-radius: 5px;
  }
  </style>
<div class="content-wrapper">
  <div class="container">
    {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
      <div class="card card-statistics">
        <div class="card-body mb-4  ">
            <div class="row px-5">
              <h4>คนไข้</h4>
            </div>
                @forelse ($patient as $show)


            <div class="row px-5 ">
              <h5 class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9 text-primary2">คุณ {{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</h5>
              <h5 class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3 " style="text-align:right ;color:#666666 ; " >({{$show ['nickname_Pat']}}) </h5>
              <br>
            <hr width=100% size=3 style="background-color:#f05f40 ">
            </div>

          <div class="clearfix px-5" >
            <div class="row ">

                <div class="float-left col-xl-10 col-lg-10 col-md-10 col-sm-10">
                <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <h6 class="">
                      เพศ : @if ($show['gender_Pat'] == 'ญ')
                          <td>{{'หญิง'}}</td>
                        @else
                          <td>{{'ชาย'}}</td>
                      @endif
                    </h6>
                  </div>


                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <h6 class="">

                      อายุ :
                        {{Carbon::parse($show['birthday_Pat'])->diff(Carbon::now()) ->format('%y ปี')}}


                    </h6>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <h6 class="">
                      น้ำหนัก : {{$show['weight_Pat']}} กก.
                    </h6>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  <h6 class="">
                    ส่วนสูง : {{$show['hight_Pat']}} ซม.
                  </h6>
                  </div>

                  </div>

                </div>

                <div class="float-left col-xl-2 col-lg-2 col-md-2 col-sm-2" style="text-align:right;">
                  <p class="card-text text-dark"></p>
                  <h6 class="bold-text">

                    <a href="#" class="btn btn-primary" style="width:100px" data-toggle="modal" data-target="#{{$show['id_patients']}}">ดูรายละเอียด</a>
                    </h6>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="{{$show['id_patients']}}" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">ชื่อ{{$show['name_Pat']}}  {{$show['lastname_Pat']}}  ({{$show['nickname_Pat']}})</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                  </div>
                  <div class="modal-body">
                    <div class="row">

                      <div class=" col-md-12 col-lg-12 col-xs-12 px-12 ">

                        <table class="table table-user-information">
                          <tbody>
                            <tr>

                            </tr>
                            <tr>
                              <td>
                                เลขประจำตัวประชาชน:
                              </td>
                              <td>{{$show['id_card_Pat']}}</td>
                            </tr>
                            <tr>
                              <td>
                                เพศ:
                              </td>
                              @if ($show['gender_Pat'] == 'ญ')
                                  <td>{{'หญิง'}}</td>
                                @else
                                  <td>{{'ชาย'}}</td>
                              @endif
                            </tr>
                            <tr>

                            <tr>
                              <td>เกิดวันที่:</td>
                              <td>{{$show['birthday_Pat']}}</td>
                            </tr>
                            <tr>
                              <td>อายุ:</td>
                                <td>{{Carbon::parse($show['birthday_Pat'])->diff(Carbon::now()) ->format('%y ปี')}}</td>
                            </tr>
                            <tr>
                              <td>น้ำหนัก:</td>
                              <td>{{$show['weight_Pat']}} กก</td>
                            </tr>
                            <tr>
                              <td>ส่วนสูง:</td>
                              <td>{{$show['hight_Pat']}} ซม</td>
                            </tr>
                            <tr>
                              <td>สัญชาติ:</td>
                              <td>{{$show['nationality_Pat']}}</td>
                            </tr>
                            <tr>
                              <td>เชื้อชาติ:</td>
                              <td>{{$show['race_Pat']}}</td>
                            </tr>
                            <tr>
                              <td>ศาสนา:</td>
                              <td>{{$show['religion_Pat']}}</td>
                            </tr>


                            <tr>
                              <td>สิ่งที่ชอบ:</td>
                              <td>{{$show['interesting_Pat']}}</td>
                            </tr>
                            <tr>
                              <td>ข้อมูลโรงพยาบาล</td>
                              <td>{{$show['hospital_pat']}}</td>
                            </tr>


                          </tbody>
                        </table>
                        <div class="col-md-12 col-lg-12 col-xs-12">
                          <table class="table table-user-information">


                            <tr>

                            </tr>

                            <tbody>
                              <tr>
                                <td width="30%">โรคที่ป่วย</td>
                                <td width="70%">
                                  @foreach ($patsick as $showsick)
                                          <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showsick['sick_description']}}">
                                            {{$showsick['sick_description']}}
                                          </div>
                                    @endforeach
                                </td>
                              </tr>
                              <tr>
                                <td width="30%">อุปกรณ์ติดตัวคนไข้</td>
                                <td width="70%">
                                  @foreach ($equpment as $showequp)

                                          <div class="text-display-box"  style="display:inline-block ; margin: 2.5px;" title="{{$showequp['equipment_description']}}">
                                            {{$showequp['equipment_description']}}
                                          </div>

                                    @endforeach
                                  </td>
                              </tr>
                              <tr>
                                <td width="30%">แพ้อาหารและยา</td>
                                <td width="70%">
                                  @foreach ($allergy as $showallergy)

                                          <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showallergy['allergy_description']}}">
                                            {{$showallergy['allergy_description']}}
                                          </div>
                                    @endforeach
                                </td>
                              </tr>

                            </tbody>
                          </table>

                        </div>


                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            </div>

<br><br>
          <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <div class="">
                    <h6 class="text-primary2">โรคประจำตัว</h6>
                  </div>
                    @foreach ($patsick as $showsick)
                            <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showsick['sick_description']}}">
                              {{$showsick['sick_description']}}
                            </div>
                      @endforeach
                </div>


                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <div class="">
                    <h6 class="text-primary2">อุปกรณ์ติดตัวคนไข้</h6>
                  </div>
                    @foreach ($equpment as $showequp)

                            <div class="text-display-box"  style="display:inline-block ; margin: 2.5px;" title="{{$showequp['equipment_description']}}">
                              {{$showequp['equipment_description']}}
                            </div>

                      @endforeach
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                  <h6 class="text-primary2">แพ้</h6>
                  @foreach ($allergy as $showallergy)

                          <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showallergy['allergy_description']}}">
                            {{$showallergy['allergy_description']}}
                          </div>
                    @endforeach
                </div>
          </div>

                </div>
              @empty



              @endforelse
            </div>

          </div>
    </div> --}}

    <div class="row mb-2">
      <div class="col-lg-2">
      </div>
      <div class="col-lg-8">



        <div class="text-right mb-4" >
          เพิ่มแผนการดูแล
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">&plus;</a>
        </div>
        <div class="card mb-4">
          <div class="card-body ">
            <h6 class="text-primary">กิจกรรมตลอดทั้งวัน</h6>


              <div class="clearfix ">

                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">

                </div>
                  <div class="float-left card-text text-primary2 col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  กิจกรรม
                </div>
               <div class="float-left card-text text-primary2 col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  ช่วงเวลา
                </div>
                <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

                </div>

              </div>
              <hr class="text-primary2">
              @if ($hasdata==1)

                <div class="clearfix">
                  <div class="clearfix row">
                    <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                     <img width="35px" src="../img/icon/turn.png"/>
                    </div>

                    <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    พลิกตัวผู้ป่วย
                  </div>
                 <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    ตลอดทั้งวัน ทุกๆ 2 ซั่วโมง
                  </div>
                  <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

                  </div>
                {{-- </div> --}}
                </div>
                </div>
                <hr>



             @endif
              @forelse ($selectplan as $show)
              @if (strpos($show['time'] , 'ไม่มีช่วงเวลา')!== false || strpos($show['time'] , 'ตลอดทั้งวัน')!== false)
                {{-- <div class="row">/ --}}
                <div class="clearfix">
                  <div class="clearfix row">
                    <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                      <img width="40px" src="../img/icon/{{$show['doing']}}.png"/>
                    </div>

                    <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    {{$show['doing']}}
                  </div>
                 <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    {{$show['time']}}
                  </div>
                  <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                    <a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
                  </div>
                {{-- </div> --}}
                </div>
                </div>
                <hr>
                      @endif

            @empty

            @endforelse
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                 <img width="35px" src="../img/icon/note.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                กิจกรรมอื่นๆ
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ไม่มีช่วงเวลา
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                <a href="otheractivity" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/clock.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ลงบันทึกประจำวัน
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ไม่มีช่วงเวลา
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                <a href="notediary" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>

            <h6 class="text-primary">กิจกรรมเช้า</h6>
            <hr>
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/pills.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ป้อนยา
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
               เช้า
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>

            @forelse ($selectplan as $show)
            @if (strpos($show['time'] , 'เช้า')!== false)
              <div class="clearfix">
                <div class="clearfix row">
                  <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                  <img width="35px" src="../img/icon/{{$show['doing']}}.png"/>
                  </div>

                  <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  {{$show['doing']}}
                </div>
               <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                 เช้า
                </div>
                <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                  <a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
                </div>
              {{-- </div> --}}
              </div>
              </div>
              <hr>

            @endif
          @empty

          @endforelse


<h6 class="text-primary">กิจกรรมกลางวัน</h6>
<hr>

            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/pills.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ป้อนยา
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
               กลางวัน
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>
          @forelse ($selectplan as $show)
          @if (strpos($show['time'] , 'กลางวัน')!== false )
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/{{$show['doing']}}.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                {{$show['doing']}}
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
               กลางวัน
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                <a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>
          @endif
        @empty

        @endforelse



            <h6 class="text-primary">กิจกรรมเย็น</h6>
            <hr>
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/pills.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ป้อนยา
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
               เย็น
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>

            @forelse ($selectplan as $show)
            @if (strpos($show['time'] , 'เย็น')!== false)
              <div class="clearfix">
                <div class="clearfix row">
                  <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                  <img width="35px" src="../img/icon/{{$show['doing']}}.png"/>
                  </div>

                  <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  {{$show['doing']}}
                </div>
               <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                 เย็น
                </div>
                <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                  <a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
                </div>
              {{-- </div> --}}
              </div>
              </div>
              <hr>
            @endif
            @empty

            @endforelse



            <h6 class="text-primary">กิจกรรมก่อนนอน</h6>
            <hr>
            <div class="clearfix">
              <div class="clearfix row">
                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                <img width="35px" src="../img/icon/pills.png"/>
                </div>

                <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                ป้อนยา
              </div>
             <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
               ก่อนนอน
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">

              </div>
            {{-- </div> --}}
            </div>
            </div>
            <hr>

            @forelse ($selectplan as $show)
            @if (strpos($show['time'] , 'ก่อนนอน')!== false)
              <div class="clearfix">
                <div class="clearfix row">
                  <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" >
                  <img width="35px" src="../img/icon/{{$show['doing']}}.png"/>
                  </div>

                  <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                  {{$show['doing']}}
                </div>
               <div class="float-left card-text col-xl-3 col-lg-3 col-md-3 col-sm-3">
                 ก่อนนอน
                </div>
                <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right">
                  <a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a>
                </div>
              {{-- </div> --}}
              </div>
              </div>
              <hr>
            @endif
            @empty

            @endforelse


            {{-- <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title mb-4">เพิ่มแผนการดูแล</h5>
                  </div>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>

                        <tr class="text-primary">

                          <th>ไอคอน</th>

                          <th>ช่วงเวลา</th>
                          <th>กิจกรรม</th>


                          <th></th>

                      </thead>
                      <tbody>
                        @forelse ($selectplan as $show)
                          <tr class="">

                            <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                            <td>{{$show['time']}}</td>
                            <td>{{$show['doing']}}</td>

                            <td><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>

                          </tr>
                        @empty

                        @endforelse
                        <tr>
                          <td><img width="35px" src="../img/icon/note.png"/></td>

                          <td>ไม่มีช่วงเวลา</td>
                          <td>กิจกรรมอื่นๆ</td>
                          <td><a href="otheractivity" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                        </tr>
                        <tr>
                          <td><img width="35px" src="../img/icon/clock.png"/></td>

                          <td>ไม่มีช่วงเวลา</td>
                          <td>ลงบันทึกประจำวัน</td>
                          <td><a href="notediary" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}
          </div>
          </div>

          </div>
          {{Form::open(['url'=>'authcare/addactivity'])}}
          <!-- Modal -->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">

                  <h4 class="modal-title">เลือกการดูแล</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                  <div class="container">

                 <div class="form-horizontal">
                     <div class="row">
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <div class="col-sm-12 control-label">
                                     <label for="startdate" class="control-label">StartDate</label>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="input-group date" id="startdate">
                                         <input type="date"name="set_date" class="form-control" />
                                         <span class="input-group-addon">
                                             <span class="far fa-calendar-alt"></span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     {{-- <div class="row">
                         <div class="col-sm-12">
                             <div class="form-group">
                                 <div class="col-sm-12 control-label">
                                     <label for="enddate">EndDate</label>
                                 </div>
                                 <div class="col-sm-12">
                                     <div class="input-group date" id="enddate">
                                         <input type="date" name="until_date" class="form-control" />
                                         <span class="input-group-addon">
                                             <span class="far fa-calendar-alt"></span>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> --}}

                     <div class=" col-sm-12">

                       <div class="form-group">
                         <label for="plan">เรื่องที่จะดูแล</label>
                         <select class="form-control" size="auto" name="doing">
                                  {{-- <option id="doing2" onclick="showMe('div_2')" value="">เลือก</option> --}}
                                   <option id="6" onclick="show('div_2')" value="vitalsign">วัดความดัน</option>
                                   <option id="7"onclick="show('div_2')" value="sugar">วัดน้ำตาล</option>
                                   <option id="8" onclick="show('div_2')" value="suction">เคาะปอดดูดเสมหะ</option>
                                   <option id="9" onclick="show('div_2')" value="feeding">ให้อาหารทางสาย</option>
                                   <option id="10" onclick="show('div_2')"  value="catheter">ปัสสาวะ</option>
                                   <option id="11" onclick="show('div_2')" value="colostomy">อุจจาระ</option>
                               </select>

                          {{-- <div id="div_2" >
                         <label for="plan_lb">กรอกเรื่องที่จะดูแล</label>
                         <input type="text" max="20" name="doing2" value="">
                       </div> --}}
                       </div>

                       {{-- <script type="text/javascript">
                           function show (it) {
                               var box = document.getElementById("doing2");
                               var vis = (box.checked) ? "block" : "none";
                               document.getElementById(it).style.display = vis;
                           }
                       </script> --}}
                       <div class="form-group">

                         <input type="radio" id="has_time_no" name="has_time" value="ไม่มีช่วงเวลา" checked onclick="show('has_time_div')">
                          <label for="has_time">ไม่ระบุช่วงเวลา</label>
                          <input type="radio" id="has_time_yes" name="has_time" value="มีช่วงเวลา" onclick="show('has_time_div')">
                           <label for="has_time">ระบุช่วงเวลา</label>

                       </div>

                    <div class="form-group" id="has_time_div" style="display:none">

                     <div class="form-group">
                       <label for="word_day_lb">ช่วงเวลาที่ต้องการ :</label>
                     </div>

                         <input type="checkbox" id="1" name="when_time_mor" onclick="showMe('div_1')" value="เช้า">
                         <label for="morning"> เช้า</label>&nbsp;&nbsp;
                         <input type="checkbox" id="2" name="when_time_noon" onclick="showMe('div_1')" value="กลางวัน">
                         <label for="noon"> กลางวัน</label>&nbsp;&nbsp;
                         <input type="checkbox" id="3" name="when_time_eve" onclick="showMe('div_1')" value="เย็น">
                         <label for="evening"> เย็น</label>&nbsp;&nbsp;
                         {{-- <input type="checkbox" id="4" name="when_time" onclick="showMe('div_1')" value="เช้า,เย็น"> --}}
                         {{-- <label for="m&n"> เช้า,เย็น</label>&nbsp;&nbsp; --}}
                         <input type="checkbox" id="4" name="when_time_night" onclick="showMe('div_1')" value="ก่อนนอน">
                         <label for="night"> ก่อนนอน</label>&nbsp;&nbsp;

                         <input type="checkbox" id="5" name="when_time_allday" onclick="showMe('div_1')" value="ตลอดทั้งวัน ทุกๆ : ">
                         <label for="allday"> ตลอดทั้งวัน</label>
                         &nbsp;&nbsp;

                         <div id="div_1" style="display:none">
                        <label for="time_lb">ทุกๆกี่ชั่วโมง? </label>
                        <input type="number" name="time" min="1" max="6" value="">
                        </div>
                       </div>

                       <script type="text/javascript">
                       function show (it) {
                           var box = document.getElementById("has_time_yes");
                           var vis = (box.checked) ? "block" : "none";
                           document.getElementById(it).style.display = vis;
                       }
                           function showMe (it) {
                              var box1 = document.getElementById("1");
                              var box2 = document.getElementById("2");
                              var box3 = document.getElementById("3");
                              var box4 = document.getElementById("4");
                              var box5 = document.getElementById("5");
                             if(box1.checked && box2.checked && box3.checked && box4.checked){
                               box5.checked=true;
                             }

                             else if(box5.checked){
                               if(box1.checked || box2.checked || box3.checked || box4.checked){
                               box5.checked=false;
                                }
                                else{
                                box5.checked=true;
                                }
                             }
                             else{
                                box5.checked=false;
                             }
                              // var box = document.getElementById("5");
                               var vis = (box5.checked) ? "block" : "none";
                               document.getElementById(it).style.display = vis;
                           }
                       </script>




                     </div>
                <div class="modal-footer">
                  {{-- {{Html::link('createplan','เพิ่ม',array('class'=>'btn btn-warning'))}} --}}
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">เพิ่ม</button>
                </div>
              </div>

            </div>
          </div>
        </div>

        </div>

            </div>
            {{Form::close()}}
              <div class="col-lg-2">
              </div>
  </div>
</div>
</div>
@endsection
