@extends('layouts/main_care')
@section('content')

  <div class="content-wrapper">

      {{-- @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach --}}

    {{-- @if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif --}}
    <div class="container">
      <div class="row mb-2">
           <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        <h3 class="page-heading mb-4">วัดชีพจร</h3>
        <div class="form-group">
          {{Form::open(['url'=>'vitalsign'])}}
        <div class="form-group">
          <label for="date_lb">วัน เวลา</label>
          <input type="text" class="form-control p-input" name="date" value="{{date('Y-m-d  H:i:s')}}" readonly>
        </div>
          <div class="form-group">
            <label for="sys_lb">Systolic (ค่าแรก)</label>
            <input type="number" min="1" class="form-control p-input" name="sys" value="" >
          </div>
          <div class="form-group">
            <label for="dia_lb">Diastolic (ค่าหลัง)</label>
            <input type="number" min="1" name="dia" class="form-control p-input" value="">
          </div>
          <div class="form-group">
            <label for="heart_rate_lb">อัตราการเต้นของหัวใจ (ครั้ง/นาที)</label>
            <input type="number" min="1" name="heart_rate" class="form-control p-input" value="">
          </div>
          <div class="form-group">
            <label for="temp_lb">อุณหภูมิร่างกาย (°c)</label>
            <input type="number" min="1" step="0.1" name="temp" class="form-control p-input" value="" >
          </div>
          <div class="form-group">
            <label for="spo2_lb">Spo2 (%)</label>
            <input type="number" min="1" name="spo2" class="form-control p-input" value="">
          </div>
          <div class="form-group">
            <label for="temp_lb">ความคิดเห็น(ถ้ามี)</label>
            <input type="text" name="comment" class="form-control p-input" value="">
          </div>
        </div>
        <br>
        <div class="form-group text-right">
          <button type="submit" class="btn btn-primary mr-2">
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
