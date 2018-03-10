@extends('layouts/main_dash')
@section('content')

    <div class="content-wrapper">
    <div class="row mb-2">
      {{-- vitalsign --}}
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title mb-4"> รอการยืนยัน</h5>
                    <div class="table-responsive">
                      <table class="table center-aligned-table">
                        <thead>
                          <tr class="text-primary">
                            <th>วันเวลา</th>
                            <th>ลูกค้า</th>
                            <th>คนไข้</th>
                            <th>ผู้ดูแล</th>
                            <th>แจ้งเหตุ</th>
                            <th>สถานะ</th>
                            <th></th>
                            <th>จัดการ</th>
                            <th></th>

                          </tr>
                        </thead>
                        <tbody>

                          @forelse ($emergency as $show)
                            <tr class="">
                              <td>{{$show['date_time']}}</td>
                              <td>ชื่อ: {{$show['name_cus']}} {{$show['lastname_cus']}} <br /> เบอร์โทร: {{$show['mobilephone_cus']}}</td>
                              <td>ชื่อ: {{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                              <td>ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}}<br /> เบอร์โทร: {{$show['mobilephone_care']}}</td>
                              <td>ข้อความ : {{$show['message']}} </td>
                              <td style="color:red;" >@if ($show['status'] == 'call')
                                {{'ฉุกเฉิน'}}
                              @endif</td>
                              <td></td>
                              {{Form::open([ 'method'  => 'delete', 'route' => [ 'callemergency.destroy', $show->id_emergencies ] ])}}
                                                <td>  {{ Form::submit('ดำเนินการแล้ว', ['class' => 'btn btn-primary btn-sm']) }}</td>
                              {{ Form::close() }}

                              {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                            </tr>
                          @empty
                              <td>ไม่มีรายการ</td>
                          @endforelse


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              {{-- vitalsign --}}


    </div>
    </div>


@endsection
