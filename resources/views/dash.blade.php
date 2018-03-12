@extends('layouts/main_dash')
@section('content')
  <?php
  use Carbon\Carbon;
  ?>
  <style>
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

        <!-- partial -->
        <div class="content-wrapper">
          <div class="container">





          <br>
          <h1>รายชื่อผู้ป่วย รอการค้นหาผู้ดูแล</h1>
          {{-- <div class="row">
          <div class="form-group">
          <br>

          </div> --}}




            {{-- {{dd($show)}} --}}

          {{-- <li>{{$show ['id_patients']}}</li>
                <li>{{$show ['name_Pat']}}</li>
                <li>{{$show ['Lastname_Pat']}}</li>
                <li>{{$show ['Nickname_pat']}}</li>
              </ul> --}}


          {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card" style="width:100%">
                <img class="card-img-top" src="img/testt.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title" style="text-align:center" >{{$show ['id_patients']}}</h5>
                  <p class="card-text" style="text-align:center">{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</p>
                </div>
                <div class="card-footer">


                  {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}}
                </div>
              </div>
          </div> --}}
@forelse ($display as $show)
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
      <div class="card card-statistics">
        <div class="card-body mb-4  ">

            <div class="row px-5 ">
              <h5 class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9 text-primary2">คุณ {{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</h5>
              <h5 class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3 " style="text-align:right ;color:#666666 ; " >({{$show ['nickname_Pat']}}) </h5>
              <br>
            <hr width=100% size=3 style="background-color:#f05f40 ">
            </div>

          <div class="clearfix px-5" >
            <div class="row ">

                <div class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9">
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

                  {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <h6 class="">
                        {{$show['birthday_Pat']}}
                    </h6>
                  </div> --}}
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
                  <br><br>
                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                      <div class="">
                        <h6 class="text-primary2">โรคประจำตัว</h6>
                      </div>
                        @foreach ($patsick as $showsick)
                          @if ($show['id_patients']==$showsick['id_patients'])
                            <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showsick['sick_description']}}">
                              {{$showsick['sick_description']}}
                            </div>
                          @endif

                          @endforeach
                    </div>
                    <br>
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                      <div class="">
                        <h6 class="text-primary2">อุปกรณ์ติดตัวคนไข้</h6>
                      </div>
                        @foreach ($equpment as $showequp)
                            @if ($show['id_patients']==$showequp['id_patients'])
                                <div class="text-display-box"  style="display:inline-block ; margin: 2.5px ;height:36px;" title="{{$showequp['equipment_description']}}">
                                  {{$showequp['equipment_description']}}
                                </div>
                                @endif
                          @endforeach
                    </div>
                    <br>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                      <div class="">
                        <h6 class="text-primary2">แพ้</h6>
                      </div>
                        @foreach ($allergy as $showallergy)
                            @if ($show['id_patients']==$showallergy['id_patients'])
                                <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showallergy['allergy_description']}}">
                                  {{$showallergy['allergy_description']}}
                                </div>
                                @endif
                          @endforeach
                    </div>

                  </div>

                </div>

                <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3" style="text-align:right;">
                  {{-- <p class="card-text text-dark"></p> --}}
                  <h6 class="bold-text">

                    <a href="#" class="btn btn-primary" style="width:100px ;text-align:right;" data-toggle="modal" data-target="#{{$show['id_patients']}}">ดูรายละเอียด</a>
                    {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-danger btn-sm'))}} --}}
                  <br><br>
                  {{Html::link('search/'.$show['id_patients'],'ค้นหาผู้ดูแล',array('class'=>'btn btn-primary','style'=>'width:100px; text-align:right;'))}}
                  </h6>
                </div>

            </div>

          {{-- <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <h6 class="" style="border: 2px solid red;
                  border-radius: 8px;">
                {{$show['sick_description']}}
                </h6>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <h6 class="" style="border: 2px solid blue;
                  border-radius: 8px;">
                {{$show['equipment_description']}}
                </h6>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <h6 class="" style="border: 2px solid green;
                  border-radius: 8px;">
                {{$show['allergy_description']}}
                </h6>
                </div>
          </div> --}}

                </div>

            </div>
          </div>
        </div>


          {{-- <div class="row mb-2">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title mb-6">{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</h5>

                            <div class="table-responsive">
                              <table class="table center-aligned-table">
                                <thead>
                                  <tr class="text-primary">

                                    <th>เพศ</th>

                                    <th>ชื่อเล่น</th>
                                    <th>วัน-เดือน-ปีเกิด</th>

                                    <th>น้ำหนัก</th>
                                    <th>ส่วนสูง</th>

                                    <th></th>
                                    <th></th>

                                  </tr>
                                </thead>

                                <tbody>

                                  <tr class="">


                                    @if ($show['gender_Pat'] == 'ญ')
                                        <td>{{'หญิง'}}</td>
                                      @else
                                        <td>{{'ชาย'}}</td>
                                    @endif

                                    <td>{{$show['nickname_Pat']}}</td>
                                    <td>{{$show['birthday_Pat']}}</td>


                                    <td>{{$show['weight_Pat']}} กก.</td>
                                    <td>{{$show['hight_Pat']}} ซม.</td>
                                    <td><label class="badge badge-success">Approved</label></td>
                                      <td>{{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary btn-sm'))}}</td>
                                    <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                                    <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> --}}

              {{-- <div class="card">
                <div class="card-header">Header</div>
                <div class="card-body">Content</div>
                <div class="card-footer">Footer</div>
              </div> --}}




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
                            {{--
                            <thead>
                              <tr>
                                <th></th>
                                <th>โรคที่ป่วย</th>
                              </tr>
                            </thead> --}}

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
@empty
  <h1>no data!!</h1>
@endforelse
</div>
</div>
@endsection
