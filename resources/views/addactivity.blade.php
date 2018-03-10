@extends('layouts/main_care')
@section('content')
<div class="content-wrapper">
  <div class="container">

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
            <table class="table center-aligned-table">
              <thead>

                <tr class="text-primary2">

                  <th>ไอคอน</th>
                  <th>ช่วงเวลา</th>
                  <th>ทำอะไร</th>

                  <th></th>

              </thead>
              @forelse ($selectplan as $show)
              @if ($show['time'] !=='เช้า'&&$show['time'] !=='กลางวัน'&&$show['time'] !=='เช้า,เย็น'&&$show['time'] !=='ก่อนนอน' )
                <tbody>
                  <tr class="">
                    {{-- <td>{{$show['id_plans']}}</td> --}}
                    <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                    {{-- <td>{{$show['set_date']}}</td>
                    <td>{{$show['until_date']}}</td> --}}
                    <td>{{$show['time']}}</td>
                    <td>{{$show['doing']}}</td>
                    <td style="text-align:right"><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                    {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                    {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                  </tr>
                  </tbody>
                      @endif

            @empty

            @endforelse


             @if ($hasdata==1)
              <tbody>
                <tr class="">

                  <td><img width="35px" src="../img/icon/turn.png"/></td>

                  <td>ตลอดทั้งวัน ทุกๆ 2 ซั่วโมง</td>
                  <td>พลิกตัวผู้ป่วย</td>

                </tr>
              </tbody>
            @endif
              <tbody>
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

          <div class="card mb-2">
          <div class="card-body">
            กิจกรรมเช้า
              <table class="table center-aligned-table">
                <thead>

                  <tr class="text-primary2">

                    <th>ไอคอน</th>

                    <th>ช่วงเวลา</th>
                    <th></th>
                    <th>ทำอะไร</th>


                    <th></th>

                </thead>
                <tbody>
                  <tr class="">

                    <td><img width="35px" src="../img/icon/pills.png"/></td>

                    <td>เช้า</td>
                    <td></td>
                    <td>ป้อนยา</td>

                  </tr>
                </tbody>
            @forelse ($selectplan as $show)
            @if (strpos($show['time'] , 'เช้า')!== false)
              <tbody>
                <tr class="">
                  {{-- <td>{{$show['id_plans']}}</td> --}}
                  <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                  {{-- <td>{{$show['set_date']}}</td> --}}
                  {{-- <td>{{$show['until_date']}}</td> --}}
                  <td>เช้า</td>
                  <td></td>
                  <td>{{$show['doing']}}</td>


                  <td style="text-align:right"><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                  {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                  {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                </tr>
              </tbody>
            @endif
          @empty

          @endforelse
        </table>
          </div>
          </div>

          <div class="card mb-2">
          <div class="card-body">
            กิจกรรมบ่าย

              <table class="table center-aligned-table">
                <thead>

                  <tr class="text-primary2">

                    <th>ไอคอน</th>

                    <th>ช่วงเวลา</th>
                    <th></th>
                    <th>ทำอะไร</th>


                    <th></th>

                </thead>
                <tbody>
                  <tr class="">

                    <td><img width="35px" src="../img/icon/pills.png"/></td>

                    <td>เช้า</td>
                    <td></td>
                    <td>ป้อนยา</td>

                  </tr>
                </tbody>
          @forelse ($selectplan as $show)
          @if ($show['time'] === 'กลางวัน' )
            <tbody>
              <tr class="">
                {{-- <td>{{$show['id_plans']}}</td> --}}
                <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                {{-- <td>{{$show['set_date']}}</td> --}}
                {{-- <td>{{$show['until_date']}}</td> --}}
                <td>{{$show['time']}}</td>
                <td></td>
                <td>{{$show['doing']}}</td>


                <td style="text-align:right"><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
              </tr>

            </tbody>
          @endif
        @empty

        @endforelse
      </table>
            </div>
          </div>

          <div class="card mb-2">
          <div class="card-body">
            กิจกรรมเย็น

              <table class="table center-aligned-table">
                <thead>

                  <tr class="text-primary2">

                    <th>ไอคอน</th>

                    <th>ช่วงเวลา</th>
                    <th></th>
                    <th>ทำอะไร</th>


                    <th></th>

                </thead>
                <tbody>
                  <tr class="">

                    <td><img width="35px" src="../img/icon/pills.png"/></td>

                    <td>เช้า</td>
                    <td></td>
                    <td>ป้อนยา</td>

                  </tr>
                </tbody>
            @forelse ($selectplan as $show)
            @if ($show['time'] === 'เย็น' ||  $show['time'] ==='เช้า,เย็น')
            <tbody>
              <tr class="">
                {{-- <td>{{$show['id_plans']}}</td> --}}
                <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                {{-- <td>{{$show['set_date']}}</td> --}}
                {{-- <td>{{$show['until_date']}}</td> --}}
                <td>{{$show['time']}}</td>
                <td></td>
                <td>{{$show['doing']}}</td>


                <td style="text-align:right"><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
              </tr>
            </tbody>
            @endif
            @empty

            @endforelse
            </table>
          </div>
          </div>

          <div class="card mb-2 ">

          <div class="card-body">
            กิจกรรมก่อนนอน

              <table class="table center-aligned-table">
                <thead>

                  <tr class="text-primary2">

                    <th>ไอคอน</th>

                    <th>ช่วงเวลา</th>
                    <th></th>
                    <th>ทำอะไร</th>


                    <th></th>

                </thead>
                <tbody>
                  <tr class="">

                    <td><img width="35px" src="../img/icon/pills.png"/></td>

                    <td>เช้า</td>
                    <td></td>
                    <td>ป้อนยา</td>

                  </tr>
                </tbody>
            @forelse ($selectplan as $show)
            @if ($show['time'] === 'ก่อนนอน')
            <tbody>
              <tr class="">
                {{-- <td>{{$show['id_plans']}}</td> --}}
                <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>
                {{-- <td>{{$show['set_date']}}</td> --}}
                {{-- <td>{{$show['until_date']}}</td> --}}
                <td>{{$show['time']}}</td>
                <td></td>
                <td>{{$show['doing']}}</td>


                <td style="text-align:right"><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">บันทึกข้อมูล</a></td>
                {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
              </tr>
            </tbody>
            @endif
            @empty

            @endforelse
            </table>
          </div>
          </div>

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
                          <th>ทำอะไร</th>


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
                       <label for="word_day_lb">ช่วงเวลาที่ต้องการ :</label>
                     </div>
                       <div class="form-group">
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
