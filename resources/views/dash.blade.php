@extends('layouts/main_dash')
@section('content')


        <!-- partial -->
        <div class="content-wrapper">



          <br>
          <h1>รายชื่อผู้ป่วย รอการค้นหาผู้ดูแล</h1>
          {{-- <div class="row">
          <div class="form-group">
          <br>

          </div> --}}




            {{-- {{dd($show)}} --}}

          {{-- <li>{{$show ['id_patients']}}</li>
                <li>{{$show ['name_Pat']}}</li>
                <li>{{$show ['Lastname_Pat']}}</li>
                <li>{{$show ['Nickname_pat']}}</li>
              </ul> --}}


          {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card" style="width:100%">
                <img class="card-img-top" src="img/testt.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title" style="text-align:center" >{{$show ['id_patients']}}</h5>
                  <p class="card-text" style="text-align:center">{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</p>
                </div>
                <div class="card-footer">


                  {{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary'))}}
                </div>
              </div>
          </div> --}}
@forelse ($display as $show)
          <div class="row mb-2">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title mb-6">{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</h5>

                            <div class="table-responsive">
                              <table class="table center-aligned-table">
                                <thead>
                                  <tr class="text-primary">
                                    {{-- <th>เลขที่</th> --}}
                                    <th>เพศ</th>
                                    {{-- <th>ชื่อ</th> --}}
                                    <th>ชื่อเล่น</th>
                                    <th>วัน-เดือน-ปีเกิด</th>
                                    
                                    <th>น้ำหนัก</th>
                                    <th>ส่วนสูง</th>
                                    {{-- <th>สถานะ</th> --}}
                                    <th></th>
                                    <th></th>

                                  </tr>
                                </thead>

                                <tbody>

                                  <tr class="">
                                    {{-- <td>{{$show['id_patients']}}</td> --}}

                                    @if ($show['gender_Pat'] == 'ญ')
                                        <td>{{'หญิง'}}</td>
                                      @else
                                        <td>{{'ชาย'}}</td>
                                    @endif
                                    {{-- <td>{{$show ['name_Pat']}} {{$show ['lastname_Pat']}}</td> --}}
                                    <td>{{$show['nickname_Pat']}}</td>
                                    <td>{{$show['birthday_Pat']}}</td>


                                    <td>{{$show['weight_Pat']}} กก.</td>
                                    <td>{{$show['hight_Pat']}} ซม.</td>
                                    {{-- <td><label class="badge badge-success">Approved</label></td> --}}
                                      <td>{{Html::link('detail/'.$show['id_patients'],'แสดงรายละเอียด',array('class'=>'btn btn-primary btn-sm'))}}</td>
                                    {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td>
                                    <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

              {{-- <div class="card">
                <div class="card-header">Header</div>
                <div class="card-body">Content</div>
                <div class="card-footer">Footer</div>
              </div> --}}

            @empty
              <h1>no data!!</h1>
            @endforelse
</div>

@endsection
