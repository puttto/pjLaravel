@extends('layouts/main_dash')
@section('content')

<div class="content-wrapper">
<div class="container">

  <div class="row mb-2">
            <div class="col-lg-12 mb-8">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4">Hoverable Table</h5>
                  <table class="table table-hover">
                    <thead>
                      <tr class="">
                        {{-- <th>#</th> --}}
                        <th>ผู้ดูแล</th>
                        <th>คนไข้</th>
                        <th style="text-align: center">action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($userplan as $show)
                        <tr class="mb-6">


                          <td width="40%">{{$show['name_Pat']}} {{$show['lastname_Pat']}}</td>
                          <td width="40%">{{$show['name_care']}} {{$show['lastname_care']}}</td>
                          <td style="text-align: center;" width="20%">
                            {{Html::link('userplan/'.$show['id_select_care_statuses'].'/edit','จัดแผนการดูแล',array('class'=>'btn btn-danger'))}}

                          </td>
                        </tr>

                      @empty
                        <tr>
                          ไม่มีแพลนที่ต้องจัด
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
@endsection
