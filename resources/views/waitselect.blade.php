@extends('layouts/main_dash')
@section('content')

    <div class="content-wrapper">
    <div class="row mb-2">
      {{-- vitalsign --}}
              <div class="col-lg-12">
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
                            <th>สถานะ</th>
                            <th>จัดการ</th>

                          </tr>
                        </thead>
                        <tbody>

                          @forelse ($waitselect as $show)
                            <tr class="">
                              <td>{{$show['created_at']}}</td>
                              <td>ชื่อ: {{$show['name_cus']}} {{$show['lastname_cus']}} <br /> เบอร์โทร: {{$show['mobilephone_cus']}}</td>
                              <td>ชื่อ: {{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                              <td>ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}}</td>
                              <td>ดำเนินการ</td>
                              <td><a href="#" class="btn btn-danger btn-sm">ลบ</a></td>
                              {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                            </tr>
                          @empty
                              <td>ไม่มีรายการที่รอยืนยัน</td>
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
