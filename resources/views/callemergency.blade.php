@extends('layouts/main_dash')
@section('content')

    <div class="content-wrapper">
      <div class="container">

<br><br><br>
    <div class="row mb-2">
      {{-- vitalsign --}}
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title mb-4">แจ้งเตือนฉุกเฉิน</h5>

                    <div class="table-responsive">
                      <table class="table center-aligned-table">
                        <thead>
                          <tr class="text-primary">
                            <th style="width:12%">วันเวลา</th>
                            <th style="width:15%">ลูกค้า</th>
                            <th style="width:15%">คนไข้</th>
                            <th style="width:15%">ผู้ดูแล</th>
                            <th style="width:15%">แจ้งเหตุ</th>
                            <th style="width:10%">สถานะ</th>
                            {{-- <th style="width:10%"></th> --}}
                            <th style="width:10%">จัดการ</th>
                            {{-- <th style="width:10%"></th> --}}

                          </tr>
                        </thead>
                        </table>


                          @forelse ($emergency as $show)
                            <table class="table center-aligned-table">
                            <tbody>
                            <tr class="">
                              <td style="width:12%">{{$show['date_time']}}</td>
                              <td style="width:15%">ชื่อ: {{$show['name_cus']}} {{$show['lastname_cus']}} <br /><a href="tel:{{$show['mobilephone_cus']}}"> เบอร์โทร: {{$show['mobilephone_cus']}}</a></td>
                              <td style="width:15%">ชื่อ: {{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                              <td style="width:15%">ชื่อ: {{$show['name_care']}} {{$show['lastname_care']}}<br /><a href="tel:{{$show['mobilephone_care']}}"> เบอร์โทร: {{$show['mobilephone_care']}}</a></td>
                              <td style="width:15%">ข้อความ : {{$show['message']}} </td>

                                @if ($show['status'] == 'call')
                                  <td style="color:red; width:10%;" >
                                {{'แจ้งศูนย์'}}
                                </td>
                                @elseif ($show['status'] == 'เรียบร้อย')
                                  <td style="color:rgb(61, 172, 28); width:10%">{{$show['status']}}</td>
                                @else
                                  <td style="width:10%">{{$show['status']}}</td>

                              @endif
                              <td style="width:10%">

                                <button type="button" name="button" a href="#" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#{{$show['id_emergencies']}}">อัพเดทสถานะ</button>
                              </td>

                              {{-- {{Form::open([ 'method'  => 'delete', 'route' => [ 'callemergency.destroy', $show->id_emergencies ] ])}}
                                                <td>  {{ Form::submit('ดำเนินการแล้ว', ['class' => 'btn btn-primary btn-sm']) }}</td>
                              {{ Form::close() }} --}}

                              {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                            </tr>
                            </tbody>
                            </table>

                            <!-- Modal -->
                            {{Form::open(['method'=>'put','route'=>['callemergency.update',$show->id_emergencies]])}}

                            <div id="{{$show['id_emergencies']}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">

                                    <h4 class="modal-title">อัพเดทสถานะ</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table center-aligned-table">
                                            <tbody>
                                          {{-- <tr class=""> --}}

                                            <tr>
                                              <td>วันเวลาที่แจ้ง:</td>
                                              <td>{{$show['date_time']}}</td>
                                            </tr>
                                            <tr>
                                              <td>ชื่อลูกค้า: <br> เบอร์โทร:</td>
                                              <td>{{$show['name_cus']}} {{$show['lastname_cus']}} <br />  <a href="tel:{{$show['mobilephone_cus']}}"> {{$show['mobilephone_cus']}}</a></td>
                                            </tr>
                                            <tr>
                                              <td>ชื่อคนไข้:</td>
                                              <td>{{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                                            </tr>
                                            <tr>
                                              <td>ชื่อผู้ดูแล: <br> เบอร์โทร:</td>
                                              <td>{{$show['name_care']}} {{$show['lastname_care']}}<br /> <a href="tel:{{$show['mobilephone_cus']}}"> {{$show['mobilephone_cus']}}</a></td>
                                            </tr>
                                            <tr>
                                              <td>ข้อความ:</td>
                                              <td>{{$show['message']}} </td>
                                            </tr>
                                            <tr>
                                              <td>สถานะที่อัพเดทใหม่</td>
                                              <td>
                                              <select class="form-control p-input" name="new_status">
                                                <option value="แจ้งลูกค้า">แจ้งลูกค้า</option>
                                                <option value="รอรถพยาบาล">รอรถพยาบาล</option>
                                                <option value="อยู่ระหว่างเดินทางไป รพ.">อยู่ระหว่างเดินทางไป รพ.</option>
                                                <option value="เรียบร้อย">เรียบร้อย</option>
                                              </select></td>
                                            </tr>




                                          {{-- </tr> --}}
                                          </tbody>
                                      </table>



                                       </div>
                                  <div class="modal-footer">
                                    {{-- {{Html::link('createplan','เพิ่ม',array('class'=>'btn btn-warning'))}} --}}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">อัพเดท</button>
                                  </div>
                                </div>

                              </div>
                            </div>
                            {{Form::close()}}
                          @empty
                              <td>ไม่มีรายการ</td>
                          @endforelse




                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>

</div>
    </div>
    </div>


@endsection
