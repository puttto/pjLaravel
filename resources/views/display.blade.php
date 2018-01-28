 @extends('layouts\main')
@section('content')
  <div class="container" style="padding-top:80px;">
{{Form::open(['url'=>'caregiver'])}}
<br>
<h1>รายชื่อผู้ป่วย รอการค้นหาผู้ดูแล</h1>
<div class="form-group">
<br>
<h2>สวัสดี Admin,  {{ Auth::user()->name }}</h2>
</div>



@forelse ($display as $show)
  {{-- {{dd($show)}} --}}

{{-- <li>{{$show ['id_patients']}}</li>
      <li>{{$show ['name_Pat']}}</li>
      <li>{{$show ['Lastname_Pat']}}</li>
      <li>{{$show ['Nickname_pat']}}</li>
    </ul> --}}


<div class="row col-xs-3 ">
    <div class="card" style="width:18rem; hight:50rem ;">
      <img class="card-img-top" src="img/testt.png" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title" style="text-align:center" >{{$show ['id_patients']}}</h5>
        <p class="card-text" style="text-align:center">{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</p>
      </div>
      <div class="card-footer">
        {{-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> --}}

        {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}}
      </div>
    </div>
</div>

    {{-- <div class="card">
      <div class="card-header">Header</div>
      <div class="card-body">Content</div>
      <div class="card-footer">Footer</div>
    </div> --}}

  @empty
    <h1>no data!!</h1>
  @endforelse

{{Form::close()}}
</div>
@endsection
