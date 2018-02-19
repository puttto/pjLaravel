 @extends('layouts/main_dash')
 @section('content')


<div class="content-wrapper">
  <div class="container">


      {{-- {{Form::open(['method'=>'put','route'=>['search.update',$id]])}} --}}
     {{Form::open(['url'=>'search'])}}
    {{-- --}}
    {{-- <div class="col-md-3  toppad  pull-right col-md-offset-3 ">

    </div>  --}}
    <div class="row" >

    @forelse($caregiverdata as $input)

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4 caregivers" data-id="{{$input ['id_caregivers']}}">
      {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
      <div class="card" >
        <img class="card-img-top" src="../img/nurse.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center">{{$input ['id_caregivers']}}</h5>
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

          <p class="card-text" style="text-align:left">ประสบการณ์รวมทั้งหมด : {{$input['year_of_caregiver']}}</p>



        </div>
        <div class="card-footer">
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#{{$input['id_caregivers']}}">ดูรายละเอียด</a>

          {{-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> --}}
           {{-- {{Html::link('search/'.$input['id_caregivers'].'/edit','แสดงรายละเอียด',array('class'=>'btn btn-primary',))}} --}}
        </div>
      </div>
    </div>

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
                    <tr>
                      <td>น้ำหนัก:</td>
                      <td>{{$input['weight_care']}} กก</td>
                    </tr>
                    <tr>
                      <td>ส่วนสูง:</td>
                      <td>{{$input['hight_care']}} ซม</td>
                    </tr>
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

 </div >
     <div class="" style="text-align:right;">
       <button type="submit" class="btn btn-primary" name="submit">ส่งผู้ดูแลให้ลูกค้า</button>
     </div>

  </div>
</div>


{{Form::close()}}
<script type="text/javascript">

$id_data=[];
  $("body").on("click", ".caregivers", function() {
    var id_caregivers = $(this).data("id");

    $(this).css("border", "2px solid #ee4b28"); //border: 2px solid #2fb5d1
    console.log(id_caregivers);
    for (var i = 0; i < $id_data.length; i++) {

      if (id_caregivers == $id_data[i]) {
        $id_data.splice(i, 1);
        $(this).css("border", "2px solid #f2f7f8");
        return;
      }
    }
    $id_data.push(id_caregivers);
    console.log($id_data);
    $('#iddata').val($id_data);
  });

</script>

{{--
<div class="button" style="text-align:right;">
  <button type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>
</div> --}} {{-- {{Html::link('search/'.$input['id_caregivers'].'/edit','ส่งข้อมูล',array('class'=>'btn btn-primary'))}} --}}
 {{-- {{Form::text('name','',['class' => 'form-control'])}} {{ Form::submit('Save',['class' => 'btn btn-primary'])
}} --}}

 @endsection
