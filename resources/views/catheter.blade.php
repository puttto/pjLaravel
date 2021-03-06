@extends('layouts/main_care')
@section('content')
  <div class="content-wrapper">
    <div class="container">
      <div class="row mb-2">
           <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        <h3 class="page-heading mb-4">บันทึกปัสสาวะ</h3>
        {{Form::open(['url'=>'authcare/catheter'])}}
        <div class="form-group">
        <div class="form-group">
          <label for="date_lb">วัน เวลา</label>
          {{-- <input type="datetime-local" class="form-control p-input" name="date" value="{{date('Y-m-d  H:i:s')}}" > --}}
          <input type="text" class="form-control" data-field="datetime"  maxDateTime readonly id="date" name="date" required autofocus>

        </div>
          <div class="form-group">
            <label for="catheter_lb">ปริมาณปัสสาวะ</label>
            <input type="number" min="1" class="form-control p-input" name="vol"  >
          </div>

          {{-- <div class="form-group">
            <label for="comment_lb">ความคิดเห็น(ถ้ามี)</label>
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
