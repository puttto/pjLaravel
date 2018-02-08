@extends('layouts/main_care')
@section('content')
  <div class="content-wrapper">
  <div class="row mb-2">
    {{-- <div class="col-lg-6">

      <div class="card">
        <div class="card-body">

        </div>

      </div>
    </div> --}}

    {{-- vitalsign --}}
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">
                      <img width="40px" src="../img/icon/vitalsign.png" alt="">
                      &nbsp;&nbsp; วัดชีพจร</h5>

                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>วันเวลา</th>
                          <th>ความดัน</th>
                          <th>ชีพจร</th>
                          <th>อุณหภูมิ</th>
                          <th>ความคิดเห็น</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse ($showvital as $vital)
                          <tr class="">
                            <td>{{$vital['date_time']}}</td>
                            <td>{{$vital['sys']}}/{{$vital['dia']}} mmHg</td>
                            <td>{{$vital['heart_rate']}} ครั้ง/นาที</td>
                            <td>{{$vital['temp']}}</td>
                            <td>{{$vital['comment']}}</td>

                            <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                          </tr>
                        @empty
                          <span>ไม่มีข้อมูล</span>
                        @endforelse


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- vitalsign --}}

            {{-- sugar --}}
                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                              <img width="40px" src="../img/icon/sugar.png" alt="">
                              &nbsp;&nbsp; วัดระดับน้ำตาล</h5>

                          <div class="table-responsive">
                            <table class="table center-aligned-table">
                              <thead>
                                <tr class="text-primary">
                                  <th>วันเวลา</th>
                                  <th>ระดับน้ำตาล</th>
                                  <th>ความคิดเห็น</th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>

                                @forelse ($showsugar as $sugar)
                                  <tr class="">
                                    <td>{{$sugar['date_time']}}</td>
                                    <td>{{$sugar['sugar_lv']}} mg/dL</td>
                                    <td>{{$sugar['comment']}}</td>

                                    <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                                    {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                  </tr>
                                @empty
                                  <span>ไม่มีข้อมูล</span>
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
