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
        <h3 class="page-heading mb-4">ป้อนอาหารทางสาย</h3>
        {{Form::open(['url'=>'authcare/feeding'])}}
        <div class="form-group">
        <div class="form-group">
          <label for="date_lb">วัน เวลา</label>
          {{-- <input type="datetime-local" class="form-control p-input" name="date" value="{{date('Y-m-d  H:i:s')}}" readonly > --}}
          <input type="text" class="form-control" data-field="datetime"  maxDateTime readonly id="date" name="date" required autofocus>

        </div>
          <div class="form-group">
            <label for="type_food_lb">ประเภทอาหาร เช่น BD(2:1)</label>
            <input type="text"  class="form-control p-input" name="type_food" value="" >
          </div>
          <div class="form-group">
            <label for="vol_lb">ปริมาณ (cc)</label>
            <input type="number" min="1" name="vol" max="600" class="form-control p-input" value="">
          </div>
          <div class="form-group">
            <label for="water_lb">น้ำตาม (cc)</label>
            <input type="number" min="1" max="600" name="water" class="form-control p-input" value="">
          </div>

          {{-- <div class="form-group">
            <label for="temp_lb">ความคิดเห็น(ถ้ามี)</label>
            <input type="text" name="comment" class="form-control p-input" value="">
          </div> --}}
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
