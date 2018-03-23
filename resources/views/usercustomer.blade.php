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
                          {{-- <th>วันเวลา</th> --}}
                          <th>ชื่อลูกค้า</th>
                          {{-- <th>เบอร์โทร</th> --}}
                          <th>ชื่อผู้ป่วย</th>
                          <th>สถานะ</th>

                          <th>จัดการ</th>


                        </tr>
                      </thead>
                      <tbody>

                        @forelse ($usercus as $show)
                          <tr class="">
                            {{-- <td>{{$show['created_at']}}</td> --}}
                            <td>ชื่อ: {{$show['name_cus']}} {{$show['lastname_cus']}} <br /> เบอร์โทร: <a href="tel:{{$show['mobilephone_cus']}}">{{$show['mobilephone_cus']}}</a></td>
                            <td>ชื่อ: {{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                            {{-- <td>ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}}</td> --}}

                            @if ($show['status']=='request')
                              <td style="color:#e0650c;">{{'ส่งเรื่องขอผู้ดูแล'}}</td>
                            @elseif ($show['status']=='wait')
                              <td style="color:#e2cf2a;">{{'รอเลือกผู้ดูแล'}}</td>
                            @elseif ($show['status']=='close')
                              <td style="color:red;">{{'ปิดงาน'}}</td>
                              @else
                                <td style="color:#00a866;">{{'อยู่ในการดูแล'}}</td>
                            @endif

                              {{-- <td>{{Html::link('search/'.$show['id_patients'],'ค้นหาผู้ดูแล',array('class'=>'btn btn-primary btn-sm','style'=>'width:100px'))}}</td> --}}
                              <td>{{Html::link('updateuserpat/'.$show['id_patients'].'/edit','แก้ไขข้อมูล',array('class'=>'btn btn-info btn-sm'))}}</td>
                            @if ($show['status']=='complete' || $show['status']=='close')

                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'usercustomer.destroy', $show->id_patients ] ])}}
                                              <td>  {{ Form::submit('ปิดงาน', ['class' => 'btn btn-danger btn-sm']) }}</td>
                            {{ Form::close() }}

                          <td><a class="btn btn-primary btn-sm" href="{{ route('usercustomer.show',$show->id_patients) }}">ส่งคำขอผู้ดูแล</a></td>
                            @endif
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
