@extends('layouts/app')
@section('content')
<div class="container" style="padding-top:100px;">


@forelse($caregiverdata as $input)
  <div class="row col-xs-3 caregivers" data-id="{{$input ['id_caregivers']}}">
  {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
      <div class="card" style="width:18rem; hight:50rem ;">
        <img class="card-img-top" src="../img/testt.png" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title" style="text-align:center" >{{$input ['id_caregivers']}}</h5>
          <p class="card-text" style="text-align:center">{{$input['name_care']}} {{$input ['lastname_care']}}</p>
        </div>
        <div class="card-footer">
          {{-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> --}}

          {{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
        </div>
      </div>
  </div>
@empty
  <span>ไม่มีผู้ดูแล ที่ตรงกัน!</span>
@endforelse
</div>

<script type="text/javascript">
$id_data =[];
  $("body").on("click",".caregivers",function(){
    var id_caregivers = $(this).data("id");

    $(this).css("background-color","red");
    console.log(id_caregivers);
    for (var i = 0; i < $id_data.length; i++) {
      if (id_caregivers==$id_data[i]) {
        $id_data.splice(i,1);
        $(this).css("background-color","white");
        return;
      }
    }
    $id_data.push(id_caregivers);
    console.log($id_data);


  });
</script>
{{-- {{Form::text('name','',['class' => 'form-control'])}}
{{ Form::submit('Save',['class' => 'btn btn-primary']) }} --}}
  @endsection
