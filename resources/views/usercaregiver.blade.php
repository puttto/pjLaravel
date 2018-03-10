@extends('layouts/main_dash')
@section('content')
  <div class="content-wrapper">
  <div class="row mb-2">

            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">รายชื่อลูกค้า</h5>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>วันเวลา</th>
                          <th>ชื่อผู้ดูแล</th>
                          {{-- <th>เบอร์โทร</th> --}}
                          <th>สถานะ</th>
                          <th></th>
                          <th>จัดการ</th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>

                        @forelse ($usercare as $show)
                          <tr class="">
                            <td>{{$show['created_at']}}</td>
                            <td>ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}} <br /> เบอร์โทร: <a href="tel:{{$show['mobilephone_care']}}">{{$show['mobilephone_care']}}</a></td>

                            {{-- <td>ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}}</td> --}}

                            @if ($show['caregiver_status']=='not_work')
                              <td style="color:#00a866;">{{'ว่าง'}}</td>
                              @else
                                <td style="color:red;">{{'ไม่ว่าง'}}</td>
                            @endif

<td></td>
                              <td><a href="#" class="btn btn-info btn-sm">แก้ไข</a></td>
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

  </div>
  </div>
@endsection
