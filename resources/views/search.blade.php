 @extends('layouts/main_dash')
 @section('content')


<div class="content-wrapper">
  <div class="container">


      {{-- {{Form::open(['method'=>'put','route'=>['search.update',$id]])}} --}}
     {{Form::open(['url'=>'search'])}}
    {{-- --}}
    {{-- <div class="col-md-3  toppad  pull-right col-md-offset-3 ">

    </div>  --}}
<div class="row col-xs-3" >

    @forelse($caregiverdata as $input)

    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4 caregivers" data-id="{{$input ['id_caregivers']}}">
      {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
      <div class="card" >
        <img class="card-img-top" src="../img/nurse.jpg" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center">{{$input ['id_caregivers']}}</h5>
          <p class="card-text" style="text-align:center">{{$input['name_care']}} {{$input ['lastname_care']}}</p>
          <p class="card-text" style="text-align:center">ความสามารถ : {{$input['id_special_skills']}}</p>
        </div>
        <div class="card-footer">

          {{-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> --}}
           {{Html::link('search/'.$input['id_caregivers'].'/edit','แสดงรายละเอียด',array('class'=>'btn btn-primary',))}}
        </div>
      </div>
    </div>

    @empty
    <span>ไม่มีผู้ดูแล ที่ตรงกัน!</span>
   @endforelse
   <input type="text" name="iddata" id="iddata" style="display:none" />

   </div>
<button type="submit" name="submit">ส่งผู้ดูแลให้ลูกค้า</button>
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
        $(this).css("border", "2px solid #fff");
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
