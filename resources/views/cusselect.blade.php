@extends('layouts/main_cus')
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
  <div class="contains">
    {{Form::open(['url'=>'authcus/cusselect'])}}
    {{-- {{Form::open(['method'=>'put','route'=>['search.update',$id]])}} --}}
    <div class="row">
      {{-- <span>test</span> --}} {{-- loop --}}
      @forelse ($cusselect as $show)


      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4 caregivers" data-id="{{$show['id_caregivers']}}">

        <div class="card card-statistics">
          <div class="card-body mb-4  ">


              <div class="row px-5 ">
                <h5 class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9 text-primary2">{{$show ['id_caregivers']}} คุณ {{$show['name_care']}}  {{$show['lastname_care']}}  </h5>
                <h5 class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3 " style="text-align:right ;color:#666666 ; " >({{$show['nickname_care']}})</h5>
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
                        เพศ : @if ($show['gender_care'] == 'ญ')
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
                          {{Carbon::parse($show['birthday_care'])->diff(Carbon::now()) ->format('%y ปี')}}


                      </h6>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                      <h6 class="">
                      การศึกษา: @if ($show['edu_caregiver'] == 0)
                            {{'ไม่มี แต่มีประสบการณ์'}}
                          @elseif ($show['edu_caregiver'] == 1)
                                {{'พนักงานผู้ช่วยพยาบาล (Nurse Aide)'}}
                              @elseif ($show['edu_caregiver'] == 2)
                                    {{'ผู้ช่วยพยาบาล (Practical Nurse)'}}
                          @else
                            {{'ผู้ช่วยพยาบาล (Registered Nurse)'}}
                        @endif
                      </h6>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <h6 class="">
                      ประสบการณ์รวมทั้งหมด : {{$show['year_of_caregiver']}}
                    </h6>
                    </div>

                    </div>
                    <br><br>
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="">
                          <h6>ทักษะด้านการดูแล</h6>
                        </div>
                          @foreach ($careskill as $showskill)
                                {{-- {{dd($showskill['id_caregivers'].','.$show['id_caregivers'])}} --}}
                              @if ($showskill['id_caregivers']==$show['id_caregivers'])

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
                              @if ($showequip['id_caregivers']==$show['id_caregivers'])
                                  <div class="text-display-box"  style="display:inline-block ; margin: 2.5px" title=" {{$showequip['medical_equipment_description']}}">{{$showequip['medical_equipment_description']}}</div>
                              @endif

                            @endforeach



                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    คะแนน : {{$show['point']}}
                    </div>
                  </div>
                  </div>

                  <div class="float-right col-xl-2 col-lg-2 col-md- col-sm-2" style="text-align:right;">
                    <p class="card-text text-dark">ปุ่ม</p>
                    <h6 class="bold-text">

                      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#{{$show ['id_caregivers']}}">ดูรายละเอียด</a>
                      {{-- {{Html::link('detail/'.$input['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary btn-sm'))}} --}}
                    </h6>
                  </div>

              </div>
            </div>

        </div>
      </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="{{$show['id_caregivers']}}" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ชื่อ{{$show['name_care']}}  {{$show['lastname_care']}}  ({{$show['nickname_care']}})</h4>
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
                        @if ($show['gender_care'] == 'ญ')
                        <td>{{'หญิง'}}</td>
                        @else
                        <td>{{'ชาย'}}</td>
                        @endif
                      </tr>

                      <tr>
                        <td>เกิดวันที่:</td>
                        <td>{{$show['birthday_care']}}</td>
                      </tr>
                      <tr>
                        <td>สัญชาติ:</td>
                        <td>{{$show['nationality_care']}}</td>
                      </tr>
                      <tr>
                        <td>เชื้อชาติ:</td>
                        <td>{{$show['race_care']}}</td>
                      </tr>
                      <tr>
                        <td>ศาสนา:</td>
                        <td>{{$show['religion_care']}}</td>
                      </tr>
                      <tr>
                        <td>น้ำหนัก:</td>
                        <td>{{$show['weight_care']}} กก</td>
                      </tr>
                      <tr>
                        <td>ส่วนสูง:</td>
                        <td>{{$show['hight_care']}} ซม</td>
                      </tr>
                      <tr>
                        <td>เบอร์โทรศัพท์:</td>
                        <td>{{$show['mobilephone_care']}}</td>
                      </tr>
                      <tr>
                        <td>id Line:</td>
                        <td>{{$show['id_line_care']}}</td>
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
      <span>ไม่มีข้อมูล</span>
    @endforelse

      <input type="text" name="iddata" id="iddata" style="display:none" />

      {{-- {{Html::link('cusselect/'.$show['id_patients'].'/edit','Test',array('class'=>'btn btn-primary'))}} --}}
    </div>
  </div>
<br><br>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-12" >
      <div class="text-right">
      <button type="submit" class=" btn btn-primary" name="submit">เลือกผู้ดูแล</button>
      </div>
    </div>
</div>
{{Form::close()}}
<script type="text/javascript">
  $id_data = [];
  $("body").on("click", ".caregivers", function() {
    var id_caregivers = $(this).data("id");
    $('.caregivers').css("border", "2px solid #f2f7f8");
    $(this).css("border", "2px solid #ee4b28"); //border: 2px solid #2fb5d1
    //console.log(id_caregivers);
    for (var i = 0; i < $id_data.length; i++) {

      if (id_caregivers == $id_data[i]) {

        $id_data.splice(i, 1);

        $(this).css("border", "2px solid #f2f7f8");
        console.log($id_data);
        $id_data = [];
        $('#iddata').val($id_data);
        return;
      }
    }
    $id_data = [id_caregivers];
    console.log($id_data);
    $('#iddata').val($id_data);
  });
</script>

@endsection
