@extends('layouts/main_dash')
@section('content')
  <div class="content-wrapper">
  <div class="container">

    <div class="row mb-2">
            <div class="col-lg-12">
              <div class="text-right" >
                เพิ่มแผนการดูแล
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">&plus;</a>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">จัดแผนการดูแลให้คนไข้</h5>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>

                        <tr class="text-primary">
                          {{-- <th>No</th> --}}
                          <th>วันเริ่มต้น</th>
                          {{-- <th>วันสิ้นสุด</th> --}}
                          <th>ช่วงเวลา</th>
                          <th>ทำอะไร</th>
                          <th>ไอคอน</th>

                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($selectplan as $show)
                          <tr class="">
                            {{-- <td>{{$show['id_plans']}}</td> --}}
                            <td>{{$show['set_date']}}</td>
                            {{-- <td>{{$show['until_date']}}</td> --}}
                            <td>{{$show['time']}}</td>
                            <td>{{$show['doing']}}</td>
                            <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>



                            {{-- <td>{{Html::link('createplan/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}



                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'createplan.destroy', $show->id_plans ] ])}}
                                              <td>  {{ Form::submit('ลบ', ['class' => 'btn btn-danger btn-sm']) }}</td>
                                            {{ Form::close() }}

                            {{-- <td>{{Html::link('createplan/'.$show['id_plans'].'/destroy','ลบ',array('class'=>'btn btn-danger btn-sm'))}}</td> --}}
                          </tr>
                        @empty
                            <tr>
                              <td>ไม่มีข้อมูล</td>
                            </tr>
                        @endforelse

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>

  {{Form::open(['url'=>'createplan'])}}
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
                 <input type="radio" id="1" name="when_time" onclick="showMe('div_1')" value="เช้า">
                 <label for="morning"> เช้า</label>&nbsp;&nbsp;
                 <input type="radio" id="2" name="when_time" onclick="showMe('div_1')" value="กลางวัน">
                 <label for="noon"> กลางวัน</label>&nbsp;&nbsp;
                 <input type="radio" id="3" name="when_time" onclick="showMe('div_1')" value="เย็น">
                 <label for="evening"> เย็น</label>&nbsp;&nbsp;
                 <input type="radio" id="4" name="when_time" onclick="showMe('div_1')" value="เช้า,เย็น">
                 <label for="m&n"> เช้า,เย็น</label>&nbsp;&nbsp;
                 <input type="radio" id="5" name="when_time" onclick="showMe('div_1')" value="ตลอดทั้งวัน ทุกๆ : ">
                 <label for="allday"> ตลอดทั้งวัน</label>
                 &nbsp;&nbsp;

                 <div id="div_1" style="display:none">
                <label for="time_lb">ทุกๆกี่ชั่วโมง? </label>
                <input type="number" name="time" min="1" max="24" value="">
                </div>
               </div>

               <script type="text/javascript">
                   function showMe (it) {
                       var box = document.getElementById("5");
                       var vis = (box.checked) ? "block" : "none";
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
  </div>
<script type="text/javascript">
// $(function () {
//
//            $('#startdate,#enddate').datetimepicker({
//                useCurrent: false,
//                minDate: moment()
//            });
//            $('#startdate').datetimepicker().on('dp.change', function (e) {
//                var incrementDay = moment(new Date(e.date));
//                incrementDay.add(1, 'days');
//                $('#enddate').data('DateTimePicker').minDate(incrementDay);
//                $(this).data("DateTimePicker").hide();
//            });
//
//            $('#enddate').datetimepicker().on('dp.change', function (e) {
//                var decrementDay = moment(new Date(e.date));
//                decrementDay.subtract(1, 'days');
//                $('#startdate').data('DateTimePicker').maxDate(decrementDay);
//                 $(this).data("DateTimePicker").hide();
//            });
//
//        });
</script>


@endsection
