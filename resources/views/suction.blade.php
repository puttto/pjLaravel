@extends('layouts/main_care')
@section('content')
  <div class="content-wrapper">
    <div class="container">
      <div class="row mb-2">
           <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
        <h3 class="page-heading mb-4">เคาะปอดดูดเสมหะ</h3>
        <div class="form-group">
          {{Form::open(['url'=>'suction'])}}
        <div class="form-group">
          <label for="date_lb">วัน เวลา</label>
          <input type="text" class="form-control p-input" name="date" value="{{date('Y-m-d  H:i:s')}}" readonly>
        </div>
          <div class="form-group">
            <label for="vol_lb">ปริมาณ</label>
            <select class="form-control p-input" name="vol">
              <option value="น้อยมาก">น้อยมาก</option>
              <option value="น้อย">น้อย</option>
              <option value="ปานกลาง">ปานกลาง</option>
              <option value="เยอะ">เยอะ</option>
              <option value="เยอะมาก">เยอะมาก</option>
            </select>
          </div>
          <div class="form-group">
            <label for="color_lb">สีเสมหะ</label>
            <select class="form-control p-input" name="color">
              <option value="ใส">ใส</option>
              <option value="ขาวขุ่น">ขาวขุ่น</option>
              <option value="เหลือง">เหลือง</option>
              <option value="เขียว">เขียว</option>
              <option value="มีเลือดปน">มีเลือดปน</option>
            </select>
          </div>
          <div class="form-group">
            <label for="spo2_lb">Spo2 หลังการดูดเสมหะ(%)</label>
            <input type="number" min="1" name="spo2" class="form-control p-input" value="">
          </div>
          <div class="form-group">
            <label for="temp_lb">ความคิดเห็น (ถ้ามี)</label>
            <input type="text" name="comment" class="form-control p-input" value="">
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
