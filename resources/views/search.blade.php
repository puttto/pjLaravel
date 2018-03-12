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

<div class="content-wrapper">
  <div class="container">


      {{-- {{Form::open(['method'=>'put','route'=>['search.update',$id]])}} --}}
     {{Form::open(['url'=>'search'])}}
    {{-- --}}
    {{-- <div class="col-md-3  toppad  pull-right col-md-offset-3 ">

    </div>  --}}
    <div class="row" >

    @forelse($caregiverdata as $input)
      @if ($input['point'])

      @endif
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4 caregivers" data-id="{{$input ['id_caregivers']}}" data-point="{{$input ['point']}}">
          <div class="card card-statistics">
            <div class="card-body mb-4  ">


                <div class="row px-5 ">
                  <h5 class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9 text-primary2">{{$input ['id_caregivers']}} คุณ {{$input['name_care']}}  {{$input['lastname_care']}}  </h5>
                  <h5 class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3 " style="text-align:right ;color:#666666 ; " >({{$input['nickname_care']}})</h5>
                  <br>
                <hr width=100% size=3 style="background-color:#f05f40 ">
                </div>

              <div class="clearfix" >
                <div class="row  col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="float-left col-xl-2 col-lg-2 col-md-2 col-sm-2" style="text-align:center;">
                    <i  aria-hidden="true">  <img width="150px" src="../img/nurse.jpg" alt=""></i>
                  </div>
                    <div class="float-initial col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="row">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <h6 class="">
                          เพศ : @if ($input['gender_care'] == 'ญ')
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
                            {{Carbon::parse($input['birthday_care'])->diff(Carbon::now()) ->format('%y ปี')}}


                        </h6>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                        <h6 class="">
                        การศึกษา: @if ($input['edu_caregiver'] == 0)
                              {{'ไม่มี แต่มีประสบการณ์'}}
                            @elseif ($input['edu_caregiver'] == 1)
                                  {{'พนักงานผู้ช่วยพยาบาล (N/A)'}}
                                @elseif ($input['edu_caregiver'] == 2)
                                      {{'ผู้ช่วยพยาบาล (P/N)'}}
                            @else
                              {{'ผู้ช่วยพยาบาล (R/N)'}}
                          @endif
                        </h6>
                      </div>

                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                      <h6 class="">
                        ประสบการณ์รวมทั้งหมด : {{$input['year_of_caregiver']}} ปี
                      </h6>
                      </div>

                      </div>
                      <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                          @foreach ($patient as $getdata)

                            @if ($input['weight_care']>=$getdata['weight_Pat']-5 && $input['weight_care']<=$getdata['weight_Pat']+5)
                              {{-- {{dd('แดง')}} --}}
                              <h6 style="color:green;">น้ำหนัก:  {{$input['weight_care']}} กก</h6>
                            @else
                                  {{-- {{dd('เขียว')}} --}}
                                <h6 style="color:red;">น้ำหนัก:  {{$input['weight_care']}} กก</h6>
                            @endif
                          @endforeach
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                          @foreach ($patient as $getdata)

                            @if ($input['hight_care']>=$getdata['hight_Pat']-10 && $input['hight_care']<=$getdata['hight_Pat']+10)
                              {{-- {{dd('แดง')}} --}}
                              <h6 style="color:green;">ส่วนสูง:  {{$input['hight_care']}} ซม</h6>
                            @else
                                  {{-- {{dd('เขียว')}} --}}
                                <h6 style="color:red;">ส่วนสูง:  {{$input['hight_care']}} ซม</h6>
                            @endif
                          @endforeach
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="">
                            <h6>ทักษะด้านการดูแล</h6>
                          </div>
                            @foreach ($careskill as $showskill)
                                @if ($showskill['id_caregivers']==$input['id_caregivers'])
                                    <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title="{{$showskill['special_skill_descption']}}">{{$showskill['special_skill_descption']}}</div>
                                @endif

                              @endforeach

                        </div>
                        <hr width=100% size=3 style="background-color:#f05f40 ">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="">
                            <h6>เครื่องมือที่เคยใช้</h6>
                          </div>

                               @foreach ($careequip as $showequip)
                                @if ($showequip['id_caregivers']==$input['id_caregivers'])
                                    <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title=" {{$showequip['medical_equipment_description']}}">{{$showequip['medical_equipment_description']}}</div>
                                @endif

                              @endforeach



                      </div>
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">


                      คะแนน :

                      {{$input['point']}}

                      </div>
                    </div>
                    </div>

                    <div class="float-right col-xl-2 col-lg-2 col-md- col-sm-2" style="text-align:right;">
                      <p class="card-text text-dark">ปุ่ม</p>
                      <h6 class="bold-text">

                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#{{$input ['id_caregivers']}}">ดูรายละเอียด</a>
                        {{-- {{Html::link('detail/'.$input['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary btn-sm'))}} --}}
                      </h6>
                    </div>

                </div>
              </div>

          </div>
        </div>
      </div>


    {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4 caregivers" data-id="{{$input ['id_caregivers']}}"> --}}
      {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
      {{-- <div class="card" > --}}
        {{-- <img class="card-img-top" src="../img/nurse.jpg" alt="Card image cap"> --}}
        {{-- <div class="card-body"> --}}
          {{-- <h5 class="card-title" style="text-align:center">{{$input ['id_caregivers']}}</h5>
          <p class="card-text" style="text-align:center">{{$input['name_care']}} {{$input ['lastname_care']}}</p>
          <p class="card-text" style="text-align:center">ความสามารถ : {{$input['id_special_skills']}}</p>
          <p class="card-text" style="text-align:left">ใบรับรองการศึกษา:
          @if ($input['edu_caregiver'] == 0)
              {{'ไม่มี แต่มีประสบการณ์'}}
            @elseif ($input['edu_caregiver'] == 1)
                  {{'พนักงานผู้ช่วยพยาบาล (Nurse Aide)'}}
                @elseif ($input['edu_caregiver'] == 2)
                      {{'ผู้ช่วยพยาบาล (Practical Nurse)'}}
            @else
              {{'ผู้ช่วยพยาบาล (Registered Nurse)'}}
          @endif
          </p>

          <p class="card-text" style="text-align:left">ประสบการณ์รวมทั้งหมด : {{$input['year_of_caregiver']}}</p> --}}



        {{-- </div>
        <div class="card-footer">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#{{$input['id_caregivers']}}">ดูรายละเอียด</a> --}}

          {{-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> --}}
           {{-- {{Html::link('search/'.$input['id_caregivers'].'/edit','แสดงรายละเอียด',array('class'=>'btn btn-primary',))}} --}}
        {{-- </div>
      </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="{{$input['id_caregivers']}}" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">ชื่อ{{$input['name_care']}}  {{$input['lastname_care']}}  ({{$input['nickname_care']}})</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-md-9 col-lg-9 col-xs-9">
                <table class="table table-user-information">
                  <tbody>
                    <tr>

                    </tr>
                    <tr>
                      <td>เพศ: </td>
                      @if ($input['gender_care'] == 'ญ')
                      <td>{{'หญิง'}}</td>
                      @else
                      <td>{{'ชาย'}}</td>
                      @endif
                    </tr>

                    <tr>
                      <td>เกิดวันที่:</td>
                      <td>{{$input['birthday_care']}}</td>
                    </tr>
                    <tr>
                      <td>สัญชาติ:</td>
                      <td>{{$input['nationality_care']}}</td>
                    </tr>
                    <tr>
                      <td>เชื้อชาติ:</td>
                      <td>{{$input['race_care']}}</td>
                    </tr>
                    <tr>
                      <td>ศาสนา:</td>
                      <td>{{$input['religion_care']}}</td>
                    </tr>
                    {{-- <tr>
                      <td>น้ำหนัก:</td>
                      <td>{{$input['weight_care']}} กก</td>
                    </tr>
                    <tr>
                      <td>ส่วนสูง:</td>
                      <td>{{$input['hight_care']}} ซม</td>
                    </tr> --}}
                    <tr>
                      <td>เบอร์โทรศัพท์:</td>
                      <td>{{$input['mobilephone_care']}}</td>
                    </tr>
                    <tr>
                      <td>id Line:</td>
                      <td>{{$input['id_line_care']}}</td>
                    </tr>

                  </tbody>
                </table>

                {{-- <a href="#" class="btn btn-info">My Sales Performance</a>
                <a href="#" class="btn btn-primary">Team Sales Performance</a> --}}


              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    @empty
    <span>ไม่มีผู้ดูแล ที่ตรงกัน!</span>
   @endforelse
   <input type="text" name="iddata" id="iddata" style="display:none" />
   <input type="text" name="point" id="point" style="display:none" />

 </div >
     <div class="" style="text-align:right;">
       <button type="submit" class="btn btn-primary" name="submit">ส่งผู้ดูแลให้ลูกค้า</button>
     </div>

  </div>
</div>


{{Form::close()}}
<script type="text/javascript">

$id_data=[];
$point=[];
  $("body").on("click", ".caregivers", function() {
    if($id_data.length<5){
    var id_caregivers = $(this).data("id");
      var point = $(this).data("point");
    $(this).css("border", "2px solid #ee4b28"); //border: 2px solid #2fb5d1
    //console.log(id_caregivers);
    for (var i = 0; i < $id_data.length; i++) {

      if (id_caregivers == $id_data[i]) {
        $id_data.splice(i, 1);
        $point.splice(i, 1);
        $(this).css("border", "2px solid #f2f7f8");
        return;
      }

    }
    $id_data.push(id_caregivers);
    $point.push(point);
    console.log($id_data,$point);
    $('#iddata').val($id_data);
    $('#point').val($point);
    }
    else{
      var id_caregivers = $(this).data("id");

      for (var i = 0; i < $id_data.length; i++) {

        if (id_caregivers == $id_data[i]) {
          $id_data.splice(i, 1);
          $point.splice(i, 1);
          $(this).css("border", "2px solid #f2f7f8");
          console.log($id_data,$point);
          return;
        }

      }
  console.log($id_data,$point);
    }
  });

</script>

{{--
<div class="button" style="text-align:right;">
  <button type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
</div> --}} {{-- {{Html::link('search/'.$input['id_caregivers'].'/edit','ส่งข้อมูล',array('class'=>'btn btn-primary'))}} --}}
 {{-- {{Form::text('name','',['class' => 'form-control'])}} {{ Form::submit('Save',['class' => 'btn btn-primary'])
}} --}}

 @endsection
