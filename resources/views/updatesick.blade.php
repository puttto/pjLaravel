@extends('layouts\main')
@section('content')
 <div class="container" style="padding-top:100px;">
   {{-- {{Form::open(['url'=>'sum'])}} --}}

@foreach ($pat as $test)

@endforeach

         {{Form::open(['method'=>'put','route'=>['updatesick.update',$test->id_patients]])}}

   <div class="form-group">
     <label for="sickness_lb">โรคประจำตัวและอาการผู้ป่วย</label>
     <select class="form-control selectpicker"   data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="sickness[]">



<optgroup label="โรค">
       @forelse ($sickness as $data)

         @if ($data['id_sickness']<23)

  <option value="{{$data['id_sickness']}}" >{{$data['sick_description']}}</option>

            @endif

       @empty
          <option value="0">no data!</option>

       @endforelse
</optgroup>
<optgroup label="ความพิการ">
       @forelse ($sickness as $data)

         @if ($data['id_sickness']>=23)
            <option value="{{$data['id_sickness']}}">{{$data['sick_description']}}</option>
         @endif

       @empty

       @endforelse
       </optgroup>
     </select>
   </div>
{{-- <div class="form-group">
{{ Form::checkbox('sickness[0]', 1) }}
{{ Form::label('skin_dis_lb','โรคผิวหนัง') }}
{{ Form::checkbox('sickness[1]', 2) }}
{{ Form::label('diabetes_lb','โรคเบาหวาน') }}
{{ Form::checkbox('sickness[2]', 3) }}
{{ Form::label('hbp_lb','โรคความดันโลหิตสูง') }}
{{ Form::checkbox('sickness[3]', 4) }}
{{ Form::label('dysilpidemia_lb','โรคไขมันในเส้นเลือด') }}
{{ Form::checkbox('sickness[4]', 5) }}
{{ Form::label('cardio_vascular_lb','โรคหัวใจ') }}
{{ Form::checkbox('sickness[5]', 6) }}
{{ Form::label('renal_and_urological_lb','โรคไตและทางเดินปัสสาวะ') }}
{{ Form::checkbox('sickness[6]', 7) }}
{{ Form::label('cancer_lb','โรคมะเร็ง') }}
{{ Form::checkbox('sickness[7]', 8) }}
{{ Form::label('stroke_lb','โรคหลอดเลือดสมองและหัวใจ') }}
{{ Form::checkbox('sickness[8]', 9) }}
{{ Form::label('parkinson_dis_lb','โรคพากินสัน') }}
{{ Form::checkbox('sickness[9]', 10) }}
{{ Form::label('dementia_lb','โรคสมองเสื่อม') }}
</div> --}}

   {{-- <div class="form-group">
     <label for="disabled_lb">ความพิการ</label>
     <select class="form-control selectpicker"   data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="sickness[]">
       <option value="">ไม่มีความพิการ</option>
       @forelse ($sickness as $data)


       @empty
          <option value="0">no data!</option>

       @endforelse
     </select>
   </div> --}}

   <div class="form-group">
     <label for="equipment_lb">อุปกรณ์ติดตัวคนไข้</label>
     <select class="form-control selectpicker"   data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="equipment[]">
       {{-- <option value="">ไม่มีอุปกรณ์ติดตัวคนไข้</option> --}}
       @forelse ($equipment as $data)
         <option value="{{$data['id_equipment']}}">{{$data['equipment_description']}}</option>



       @empty
        <option value="0">no data!</option>
       @endforelse

       {{-- <option value="0">ไม่มีอุปกรณ์ติดตัวคนไข้</option>
       <option value="1">สายสวนปัสสาวะ</option>
       <option value="2">สายให้อาหาร</option>
       <option value="3">ถุงอุจจาระหน้าท้อง</option>
       <option value="4">สายให้อาหารหน้าท้อง</option>
       <option value="5">ท่อเจาะคอ</option> --}}
     </select>
   </div>
   <div class="form-group">
     <label for="food_allergy_lb">แพ้</label>
     <select class="form-control selectpicker"   data-style="btn-info" multiple data-max-options="" data-live-search="true" size="auto" name="allergy[]">

       @forelse ($allergy as $data)
         <option value="{{$data['id_allergies']}}">{{$data['allergy_description']}}</option>
       @empty
        <option value="0">no data!</option>
       @endforelse
     </select>
   </div>

   {{-- <div class="form-group">
     <label for="food_allergy_lb">ใหม่</label>
     <select  multiple name="allergy[]" id="my-allergy" data-live-search="true">

       @forelse ($allergy as $data)
         <option value="{{$data['id_allergies']}}">{{$data['allergy_description']}}</option>
       @empty
        <option value="0">no data!</option>
       @endforelse
     </select>
   </div>

   <script type="text/javascript">
     $("#my-allergy").multiselect(
         {
           // title: "Select Language",
           // maxSelectionAllowed:5

         });

         // $("span.clickable.removeOption").html("<span>X</span>");
   </script>

<style>
.glyphicon.glyphicon-remove{
  background-color: red;
}

</style> --}}

<br><br><br>
   <div class="button" style="text-align:right;">
   <button  type="submit" class="btn btn-info" style="width:120px; background-color:rgb(49, 160, 240)">ยืนยัน</button>

{{-- {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}} --}}
   </div>
   </div>

{{Form::close()}}

 </div>
@endsection
