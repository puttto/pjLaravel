@extends('layouts/main_care')
@section('content')
<div class="content-wrapper">
  <div class="container">

    <div class="row mb-2">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title mb-4">เพิ่มแผนการดูแล</h5>
                  </div>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>

                        <tr class="text-primary">
                          {{-- <th>No</th> --}}
                          <th>วันเริ่มต้น</th>
                          <th>วันสิ้นสุด</th>
                          <th>ช่วงเวลา</th>
                          <th>ทำอะไร</th>
                          <th>ไอคอน</th>

                          <th></th>
                          {{-- <th></th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($selectplan as $show)
                          <tr class="">
                            {{-- <td>{{$show['id_plans']}}</td> --}}
                            <td>{{$show['set_date']}}</td>
                            <td>{{$show['until_date']}}</td>
                            <td>{{$show['time']}}</td>
                            <td>{{$show['doing']}}</td>
                            <td><img width="35px" src="../img/icon/{{$show['doing']}}.png"/></td>

                            <td><a href="{{$show['doing']}}" class="btn btn-primary btn-sm">เพิ่มบันทึกการดูแล</a></td>
                            {{-- <td>{{Html::link('{{$show['doing']}}/'.$show['id_plans'].'/edit','จัดการ',array('class'=>'btn btn-warning btn-sm'))}}</td> --}}
                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                          </tr>
                        @empty
                            <tr>
                              <td>ไม่มีข้อมูล</td>
                            </tr>
                        @endforelse

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>
@endsection
