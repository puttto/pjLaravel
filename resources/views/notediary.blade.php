@extends('layouts/main_care')
@section('content')
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
  <div class="content-wrapper">
    <div class="container">
      <div class="row mb-2">
           <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        <h3 class="page-heading mb-4">ลงบันทึกประจำวัน</h3>
        <div class="form-group">
        {{Form::open(['url'=>'authcare/notediary'])}}
        <div class="form-group">
          <label for="date_lb">วัน เวลา</label>
          <input type="text" class="form-control p-input" name="date" value="{{date('Y-m-d  H:i:s')}}" readonly>
        </div>
        {{-- <div class="form-check">
          <label>
            <input type="checkbox" name="" class="form-check-input">
            Check me out
          </label>
        </div> --}}

          <div class="form-group">
            <label for="overview_lb">ภาพรวมระหว่างการทำงาน</label>
            <select class="form-control p-input" name="overview">
              <option value="ปกติ">ปกติ</option>
              <option value="ไม่ปกติ">ไม่ปกติ</option>
            </select>
          </div>
          <div class="form-group">
            <label for="howare_lb">ระหว่างการทำงานคนไข้เป็นอย่างไร?</label>
            <input type="text"  class="form-control p-input" name="howare" value="" >
          </div>
          <div class="form-group">
            <label for="type_food_lb">พบปัญหาอะไรในระหว่างการทำงานไหม?</label>
            <input type="text"  class="form-control p-input" name="porb" value="" >
          </div>
          <div class="form-group">
            <label for="type_food_lb">ความคิดเห็นด้านการดูแล (ถ้ามี)</label>
            <input type="text"  class="form-control p-input" name="comment" value="" >
          </div>
        </div>
        <br>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-primary btn-sm">
            เพิ่ม
          </button>
        </div>
        {{Form::close()}}
        </div>
      </div>
      </div>
      </div>
    </div>
  </div>
@endsection
