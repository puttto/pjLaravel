@extends('layouts/main_care')
@section('content')
  <style>
.dropbtn {
    background-color: #3498DB;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}



.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>

  <div class="content-wrapper">
{{--
@forelse ($findid as $key )

@empty
  <h4>รอดำเนินการ</h4>
@endforelse --}}
  <div class="">
    {{-- <div class="col-lg-6">

      <div class="card">
        <div class="card-body">

        </div>

      </div>
    </div> --}}

    {{-- vitalsign --}}

    <div  class="">
      <div  class="row">
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mb-4">
        <div  class="">
        <div class="card card-statistics">
          <div class="card-body">
            <div id="hidevitalmax" class="">
            <h5>วัดสัญญาณชีพล่าสุด   </h5>
            {{-- <h6>{{$showvitalmax['date_time']}}</h6> --}}
            <br>
            <div class="clearfix" >
              <div class="row">
              <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <h4 class="text-primary">
                  <i  aria-hidden="true">  <img width="40px" src="../img/icon/vitalsign.png" alt=""></i>
                </h4>
              </div>


              {{-- <div class="float-left col-xl-1 col-lg-1 col-md-2 col-sm-2">

              </div> --}}
              <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <p class="card-text text-dark">ความดันล่าสุด</p>
                <h6 class="bold-text">
                  @if (empty($showvitalmax['sys']))
                    <style>
                    #hidevitalmax {

                        display: none;
                    }
                    </style>
                    @else
                      {{$showvitalmax['sys']}} / {{$showvitalmax['dia']}} mmHg
                  @endif

                </h6>
              </div>
              {{-- <div class="float-right"> --}}

              <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <p class="card-text text-dark">อุณหภูมิ</p>
                <h6 class="bold-text">
                  @if (empty($showvitalmax['temp']))
                    <style>
                    #hidevitalmax {

                        display: none;
                    }
                    </style>
                    @else
                      {{$showvitalmax['temp']}} °C
                  @endif

                </h6>
              </div>
              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <p class="card-text text-dark">spo2</p>
                <h6 class="bold-text">
                  @if (empty($showvitalmax['spo2']))
                    <style>
                    #hidevitalmax {

                        display: none;
                    }
                    </style>
                    @else
                      {{$showvitalmax['spo2']}} %
                  @endif

                </h6>
              </div>
              {{-- </div> --}}
              </div>


            </div>
            {{-- end clearfix --}}

            {{-- <br>
            <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าความดัน ตัวบน(Systolic Pressure) ไม่ควรเกิน 140-150 mmHg ตัวล่าง (Diastolic Pressure) ไม่ควรเกิน 95 mmHg
            </p>
            <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าspo2 ไม่ควรต่ำกว่า 95% หากต่ำกว่ากำหนดแนะนำให้ปรึกษาแพทย์
            </p>
            <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> อุณหภูมิ ไม่ควรเกิน 37 °C ขึ้นอยู่กับกิจกรรมที่ได้รับหรืออาจมีไข้
            </p> --}}
            <hr />


            </div>

              <div id="hidescutionmax" class="">
                <h5>เคาะปอดดูดเสมหะ</h5>
                <br>
                <div class="clearfix">
                  <div class="row">

                    <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                      <h4 class="text-primary">
                        <i  aria-hidden="true">  <img width="40px" src="../img/icon/suction.png" alt=""></i>
                      </h4>
                    </div>
                  <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="card-text text-dark">ปริมาณเสมหะ</p>
                    <h6 class="bold-text">
                      @if (empty($showsuctionmax['vol']))
                        <style>
                        #hidescutionmax {

                            display: none;
                        }
                        </style>
                        @else
                          {{$showsuctionmax['vol']}}
                      @endif

                    </h6>
                  </div>
                  <div class="float-left col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="card-text text-dark">สีเสมหะ</p>
                    <h6 class="bold-text">
                      @if (empty($showsuctionmax['color']))
                        <style>
                        #hidescutionmax {

                            display: none;
                        }
                        </style>
                        @else
                          {{$showsuctionmax['color']}}
                      @endif

                    </h6>
                  </div>

                  <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3">
                    <p class="card-text text-dark">ค่าspo2 หลังการดูดเสมหะ</p>
                    <h6 class="bold-text">
                      @if (empty($showsuctionmax['spo2']))
                        <style>
                        #hidescutionmax {

                            display: none;
                        }
                        </style>
                        @else
                          {{$showsuctionmax['spo2']}} %
                      @endif

                    </h6>
                  </div>

                </div>
                {{-- <p class="text-muted">
                  <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าspo2 ไม่ควรต่ำกว่า 95% หากต่ำกว่ากำหนดแนะนำให้ปรึกษาแพทย์
                </p> --}}
              </div>

            <hr />
          </div>

            <div id="hidesugarmax" class="">
            <h5>วัดระดับน้ำตาล</h5>
            <br>
            <div class="clearfix">
              <div class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9">
                <h4 class="text-primary">
                  <i  aria-hidden="true"><img width="40px" src="../img/icon/sugar.png" alt=""></i>
                </h4>
              </div>

              <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3">
                <p class="card-text text-dark">ปริมาณน้ำตาล</p>
                <h6 class="bold-text">
                  @if (empty($showsugarmax['sugar_lv']))
                    <style>
                    #hidesugarmax {

                        display: none;
                    }
                    </style>
                    @else
                      {{$showsugarmax['sugar_lv']}} mg/dL
                  @endif

                </h6>
              </div>
            </div>
            {{-- <p class="text-muted">
              <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ระดับน้ำตาลเกณฑ์ปกติ หลังจากงดอาหาร 8 ชั่วโมง ไม่ควรเกิน 130 mg/dL
            </p> --}}

          <hr />
          </div>

          <div id="hidecathetersum" class="">
          <h5>ปริมาณปัสสาวะในหนึ่งวัน</h5>
          <br>
          <div class="clearfix">
            <div class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9">
              <h4 class="text-primary">
                <i  aria-hidden="true"><img width="40px" src="../img/icon/catheter.png" alt=""> </i>
              </h4>
            </div>
            <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3">
              <p class="card-text text-d  ark">ปริมาณปัสสาวะ</p>

              <h6 class="bold-text">
                @if (empty($showcathetersum) or $showcathetersum == 0)
                <style>
                #hidecathetersum {

                    display: none;
                }
                </style>
              @else
                {{$showcathetersum}} CC
              @endif

              </h6>

            </div>
          </div>
          {{-- <p class="text-muted">
            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะปกติต่อวันจะอยู่ประมาณ 1 - 2 ลิตร ไม่ต้องจำกัดปริมาณน้ำดื่ม
          </p>
          <p class="text-muted">
            <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะมากเกิน 2.5 ลิตร อาจมีการดื่มน้ำมากเกินไป การรับประทานยาขับปัสสาวะ ภาวะน้ำตาลในเลือดสูง หรือ การทำงานของไตผอดปกติ
          </p> --}}



      <hr />
    </div>

    <div id="hidecolostomycount" class="">
    <h5>การขับถ่าย</h5>
    <br>
    <div class="clearfix">
      <div class="float-left col-xl-9 col-lg-9 col-md-9 col-sm-9">
        <h4 class="text-primary">
          <i  aria-hidden="true"><img width="40px" src="../img/icon/colostomy.png" alt=""> </i>
        </h4>
      </div>
      <div class="float-right col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <p class="card-text text-dark">ปริมาณอุจจาระ/สัปดาห์</p>

        <h6 class="bold-text">
          @if ($countcolostomy == 0)
          <style>
          #hidecolostomycount {

              display: none;
          }
          </style>
        @else
          {{$countcolostomy}} ครั้ง
        @endif

        </h6>

      </div>
    </div>
    {{-- <p class="text-muted">
      <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะปกติต่อวันจะอยู่ประมาณ 1 - 2 ลิตร ไม่ต้องจำกัดปริมาณน้ำดื่ม
    </p>
    <p class="text-muted">
      <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะมากเกิน 2.5 ลิตร อาจมีการดื่มน้ำมากเกินไป การรับประทานยาขับปัสสาวะ ภาวะน้ำตาลในเลือดสูง หรือ การทำงานของไตผอดปกติ
    </p> --}}



<hr />
</div>


        </div>
      </div>

            {{-- <div id="hidevitalmax" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <h5>วัดสัญญาณชีพล่าสุด   </h5>

                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="">
                        <i  aria-hidden="true">  <img width="40px" src="../img/icon/vitalsign.png" alt=""></i>
                      </h4>
                    </div>

                    <div class="float-right">

                    <div class="float-initial">
                      <p class="card-text text-dark">อุณหภูมิ</p>
                      <h6 class="bold-text">
                        @if (empty($showvitalmax['temp']))
                          <style>
                          #hidevitalmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showvitalmax['temp']}} °C
                        @endif

                      </h6>
                    </div>
                    <div class="float-initial">
                      <p class="card-text text-dark">spo2</p>
                      <h6 class="bold-text">
                        @if (empty($showvitalmax['spo2']))
                          <style>
                          #hidevitalmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showvitalmax['spo2']}} %
                        @endif

                      </h6>
                    </div>
                    </div>
                    <div class="row">


                    <div class="float-left col-sm-1">

                    </div>
                    <div class="float-left">
                      <p class="card-text text-dark">ความดันล่าสุด</p>
                      <h6 class="bold-text">
                        @if (empty($showvitalmax['sys']))
                          <style>
                          #hidevitalmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showvitalmax['sys']}} / {{$showvitalmax['dia']}} mmHg
                        @endif

                      </h6>
                    </div>
                    </div>
                  </div>
                  <br>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าความดัน ตัวบน(Systolic Pressure) ไม่ควรเกิน 140-150 mmHg ตัวล่าง (Diastolic Pressure) ไม่ควรเกิน 95 mmHg
                  </p>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าspo2 ไม่ควรต่ำกว่า 95% หากต่ำกว่ากำหนดแนะนำให้ปรึกษาแพทย์
                  </p>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> อุณหภูมิ ไม่ควรเกิน 37 °C ขึ้นอยู่กับกิจกรรมที่ได้รับหรืออาจมีไข้
                  </p>
                </div>
              </div>
            </div> --}}

            {{-- <div id="hidescutionmax" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <h5>เคาะปอดดูดเสมหะ</h5>
                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <i aria-hidden="true"><img width="40px" src="../img/icon/suction.png" alt=""></i>
                      </h4>
                    </div>
                    <div class="float-right">

                    <div class="float-initial">
                      <p class="card-text text-dark">ปริมาณเสมหะ</p>
                      <h6 class="bold-text">
                        @if (empty($showsuctionmax['vol']))
                          <style>
                          #hidescutionmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showsuctionmax['vol']}}
                        @endif

                      </h6>
                    </div>
                    <div class="float-initial">
                      <p class="card-text text-dark">สีเสมหะ</p>
                      <h6 class="bold-text">
                        @if (empty($showsuctionmax['color']))
                          <style>
                          #hidescutionmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showsuctionmax['color']}}
                        @endif

                      </h6>
                    </div>
                    </div>
                    <div class="row">


                    <div class="float-left col-sm-1">

                    </div>
                    <div class="float-left">
                      <p class="card-text text-dark">ค่าspo2 หลังการดูดเสมหะ</p>
                      <h6 class="bold-text">
                        @if (empty($showsuctionmax['spo2']))
                          <style>
                          #hidescutionmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showsuctionmax['spo2']}} %
                        @endif

                      </h6>
                    </div>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ค่าspo2 ไม่ควรต่ำกว่า 95% หากต่ำกว่ากำหนดแนะนำให้ปรึกษาแพทย์
                  </p>
                </div>
              </div>
            </div> --}}
            {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <i aria-hidden="true"><img width="40px" src="../img/icon/feeding.png" alt=""></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Revenue</p>
                      <h6 class="bold-text">$65656</h6>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i> Weekly Sales
                  </p>
                </div>
              </div>
            </div> --}}


            {{-- <div id="hidesugarmax" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <h5>วัดระดับน้ำตาล</h5>
                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i  aria-hidden="true"><img width="40px" src="../img/icon/sugar.png" alt=""></i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">ปริมาณน้ำตาล</p>
                      <h6 class="bold-text">
                        @if (empty($showsugarmax['sugar_lv']))
                          <style>
                          #hidesugarmax {

                              display: none;
                          }
                          </style>
                          @else
                            {{$showsugarmax['sugar_lv']}} mg/dL
                        @endif

                      </h6>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ระดับน้ำตาลเกณฑ์ปกติ หลังจากงดอาหาร 8 ชั่วโมง ไม่ควรเกิน 130 mg/dL
                  </p>
                </div>
              </div>
            </div>
            <div id="hidecatheter" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <h5>ปริมาณปัสสาวะในหนึ่งวัน</h5>
                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i  aria-hidden="true"><img width="40px" src="../img/icon/catheter.png" alt=""> </i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-d  ark">ปริมาณปัสสาวะ</p>

                      <h6 class="bold-text">
                        @if ($showcathetersum == 0)
                        <style>
                        #hidecatheter {

                            display: none;
                        }
                        </style>
                      @else
                        {{$showcathetersum}} CC
                      @endif

                      </h6>

                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะปกติต่อวันจะอยู่ประมาณ 1 - 2 ลิตร ไม่ต้องจำกัดปริมาณน้ำดื่ม
                  </p>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณปัสสาวะมากเกิน 2.5 ลิตร อาจมีการดื่มน้ำมากเกินไป การรับประทานยาขับปัสสาวะ ภาวะน้ำตาลในเลือดสูง หรือ การทำงานของไตผอดปกติ                   </p>
                </div>
              </div>
            </div>
            <div id="hidecolostomycount" class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                  <div class="card-body">
                  <h5>การขับถ่ายในหนึ่งวัน</h5>
                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i  aria-hidden="true"><img width="40px" src="../img/icon/colostomy.png" alt=""> </i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark"></p>
                      <h6 class="bold-text">
                        @if ($countcolostomy == 0)
                        <style>
                        #hidecolostomycount {

                            display: none;
                        }
                        </style>
                      @else
                        {{$countcolostomy}}  ครั้ง/สัปดาห์
                      @endif
                        </h6>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> ปริมาณการขับถ่ายปกติ จะอยู่ที่ 3 ครั้ง/สัปดาห์
                  </p>
                  <p class="text-muted">
                    <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i> หากปริมาณการขับถ่ายน้อยกว่า 3 ครั้ง/สัปดาห์ อาจมีภาวะท้องผูก ควรรับประทานน้ำให้เพียงพอ รับประทานอาหารที่มีกากใย และเคลื่อนไหวให้มาก หากเป็นผู้ป่วยติดเตียง อาจจพิจารณาการสวนทวาร
                  </p>
                </div>
              </div>
            </div> --}}

            {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <h5>วัดระดับน้ำตาล</h5>
                  <br>
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                        <i  aria-hidden="true"><img width="40px" src="../img/icon/note.png" alt=""> </i>
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Followers</p>
                      <h4 class="bold-text">+62,500</h4>
                    </div>
                  </div>
                  <p class="text-muted">
                    <i class="fa fa-repeat mr-1" aria-hidden="true"></i> Just Updated
                  </p>
                </div>
              </div>
            </div> --}}
          </div>
          </div>
          <div id="hideother" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4">
            <div class="card card-statistics">
              <div class="card-body">
                <h5 class="card-title" >
                  <img width="40px" src="../img/icon/note.png" alt="">
                  &nbsp;&nbsp; กิจกรรมอื่นๆในวันนี้ </h5>
                <table class="table center-aligned-table">
                  <thead>
                    <tr class="text-primary">
                      <th>วันเวลา</th>
                      <th>กิจกรรม</th>

                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    @forelse ($showother as $other)
                      <tr class="">
                        <td>{{$other['date_time']}}</td>
                        <td>{{$other['name_ac']}}</td>
                        <td></td>
                        {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                        {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                      </tr>
                    @empty
                      <style>
                      #hideother {

                          display: none;
                      }
                      </style>
                    @endforelse


                  </tbody>
                </table>
              </div>
        </div>
          </div>

          </div>

          <div id="hidnotediary" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
            <div class="card card-statistics">
              <div class="card-body">
                <h5 class="card-title" >
                  <img width="40px" src="../img/icon/clock.png" alt="">
                  &nbsp;&nbsp; ภาพรวมการดูแลใน 3 วันที่ผ่านมา</h5>

                <br>
                <div class="table-responsive" >
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="text-primary">
                        <th>วันเวลา</th>
                        <th>ภาพรวมระหว่างการทำงาน</th>
                        <th>คนไข้เป็นอย่างไร?</th>
                        <th>พบปัญหาอะไรไหม?</th>
                        <th>ความคิดเห็น</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      @forelse ($shownotediary as $notediary)
                        <tr class="">
                          <td>{{$notediary['date_time']}}</td>
                          <td>{{$notediary['overview']}}</td>
                          <td>{{$notediary['howare']}}</td>
                          <td>{{$notediary['prob']}}</td>
                          <td>{{$notediary['comment']}}</td>
                          <td></td>
                          {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                          {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                        </tr>
                      @empty
                        <style>
                        #hidnotediary {

                            display: none;
                        }
                        </style>
                      @endforelse


                    </tbody>
                  </table>
              </div>
              </div>
            </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
            <br><br><br>
            </div>
          <div class="row">


            <div id="hidevital" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
              <div class="card mb-4">
                <div class="card-body ">
                    <h5 class="card-title   " >

                      <img width="40px" src="../img/icon/vitalsign.png" alt="">
                      &nbsp;&nbsp; วัดชีพจร 7 วันที่ผ่านมา </h5>
{{-- @if ($avg>100)
    <h2>HIGH</h2>
@endif --}}



                  <div class="table-responsive" >
                    <table class="table center-aligned-table">
                      <thead>
                        <tr class="text-primary">
                          <th>วันเวลา</th>
                          <th>ความดัน</th>
                          <th>ชีพจร</th>
                          <th>อุณหภูมิ</th>
                          <th>spo2</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse ($showvital as $vital)
                          <tr class="">
                            <td>{{$vital['date_time']}}</td>
                            <td>{{$vital['sys']}}/{{$vital['dia']}} mmHg</td>
                            <td>{{$vital['heart_rate']}} ครั้ง/นาที</td>
                            <td>{{$vital['temp']}} °C</td>
                            <td>{{$vital['spo2']}} %</td>
                            <td></td>



                            {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                          </tr>
                        @empty
                          <style>
                          #hidevital {

                              display: none;
                          }
                          </style>
                        @endforelse


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- vitalsign --}}

            {{-- sugar --}}
                    <div id="hidesugar" class="col-lg-6 mb-4">
                      <div class="card">
                        <div class="card-body mb-4">
                            <h5 class="card-title ">
                              <img width="40px" src="../img/icon/sugar.png" alt="">
                              &nbsp;&nbsp; วัดระดับน้ำตาล 7 วันที่ผ่านมา</h5>


                          <div class="table-responsive" >
                            <table class="table center-aligned-table">
                              <thead>
                                <tr class="text-primary">
                                  <th>วันเวลา</th>
                                  <th>ระดับน้ำตาล</th>
                                  <th></th>
                                  {{-- <th></th> --}}
                                </tr>
                              </thead>
                              <tbody>

                                @forelse ($showsugar as $sugar)
                                  <tr class="">
                                    <td>{{$sugar['date_time']}}</td>
                                    <td>{{$sugar['sugar_lv']}} mg/dL</td>
                                    <td></td>


                                    {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                    {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                  </tr>
                                @empty
                                  <style>
                                  #hidesugar {

                                      display: none;
                                  }
                                  </style>
                                @endforelse


                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- sugar --}}

                    {{-- suction --}}
                            <div id="hidesuction" class="col-lg-6 mb-4">
                              <div class="card">
                                <div class="card-body mb-4">
                                    <h5 class="card-title ">
                                      <img width="40px" src="../img/icon/suction.png" alt="">
                                      &nbsp;&nbsp; เคาะปอดดูดเสมหะ 7 วันที่ผ่านมา</h5>


                                  <div class="table-responsive">
                                    <table class="table center-aligned-table">
                                      <thead>
                                        <tr class="text-primary">
                                          <th>วันเวลา</th>
                                          <th>ปริมาณสมหะ</th>
                                          <th>สีเสมหะ</th>
                                          <th>ค่าspo2</th>
                                          <th></th>
                                          {{-- <th></th> --}}
                                        </tr>
                                      </thead>
                                      <tbody>

                                        @forelse ($showsuction as $suction)
                                          <tr class="">
                                            <td>{{$suction['date_time']}}</td>
                                            <td>{{$suction['vol']}}</td>
                                            <td>{{$suction['color']}}</td>
                                            <td>{{$suction['spo2']}} %</td>
                                            <td></td>
                                            {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                          </tr>
                                        @empty
                                          <style>
                                          #hidesuction {

                                              display: none;
                                          }
                                          </style>
                                        @endforelse


                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{-- suction --}}

                            {{-- feeding --}}
                                    <div id="hidefeeding" class="col-lg-6 mb-4">
                                      <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">
                                              <img width="40px" src="../img/icon/feeding.png" alt="">
                                              &nbsp;&nbsp; ป้อนอาหารทางสายยาง 7 วันที่ผ่านมา</h5>

                                          <div class="table-responsive" >
                                            <table class="table center-aligned-table">
                                              <thead>
                                                <tr class="text-primary">
                                                  <th>วันเวลา</th>
                                                  <th>ชนิดอาหาร</th>
                                                  <th>ปริมาณ</th>
                                                  <th>น้ำตาม</th>
                                                  <th></th>
                                                  {{-- <th></th> --}}
                                                </tr>
                                              </thead>
                                              <tbody>

                                                @forelse ($showfeeding as $feed)
                                                  <tr class="">
                                                    <td>{{$feed['date_time']}}</td>
                                                    <td>{{$feed['type_food']}}</td>
                                                    <td>{{$feed['vol']}} cc</td>
                                                    <td>{{$feed['water']}} cc</td>
                                                    <td></td>
                                                    {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                                    {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                                  </tr>
                                                @empty
                                                  <style>
                                                  #hidefeeding {

                                                      display: none;
                                                  }
                                                  </style>
                                                @endforelse


                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    {{-- feeding --}}

                                    {{-- catheter --}}
                                            <div id="hidecatheter" class="col-lg-6 mb-4">
                                              <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">
                                                      <img width="40px" src="../img/icon/catheter.png" alt="">
                                                      &nbsp;&nbsp; บันทึกการปัสสาวะ 7 วันที่ผ่านมา</h5>
                                                  <div class="table-responsive" >
                                                    <table class="table center-aligned-table">
                                                      <thead>
                                                        <tr class="text-primary">
                                                          <th>วันเวลา</th>
                                                          <th>ปริมาณปัสสาวะ</th>
                                                          <th></th>
                                                          {{-- <th></th> --}}
                                                        </tr>
                                                      </thead>
                                                      <tbody>

                                                        @forelse ($showcatheter as $catheter)
                                                          <tr class="">
                                                            <td>{{$catheter['date_time']}}</td>
                                                            <td>{{$catheter['vol']}} CC</td>
                                                            <td></td>
                                                            {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                                          </tr>
                                                        @empty
                                                          <style>
                                                          #hidecatheter {

                                                              display: none;
                                                          }
                                                          </style>
                                                        @endforelse


                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            {{-- catheter --}}

                                            {{-- colostomy --}}
                                                    <div id="hidecolostomy" class="col-lg-6 mb-4">
                                                      <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-4">
                                                              <img width="40px" src="../img/icon/colostomy.png" alt="">
                                                              &nbsp;&nbsp; บันทึกกาอุจจาระ 7 วันที่ผ่านมา</h5>


                                                          <div class="table-responsive" >
                                                            <table class="table center-aligned-table">
                                                              <thead>
                                                                <tr class="text-primary">
                                                                  <th>วันเวลา</th>
                                                                  <th></th>
                                                                  {{-- <th></th> --}}
                                                                </tr>
                                                              </thead>
                                                              <tbody>

                                                                @forelse ($showcolostomy as $colostomy)
                                                                  <tr class="">
                                                                    <td>{{$colostomy['date_time']}}</td>
                                                                    <td>{{$colostomy['vol']}}</td>
                                                                    <td></td>
                                                                    {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                                                    {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                                                  </tr>
                                                                @empty
                                                                  <style>
                                                                  #hidecolostomy {

                                                                      display: none;
                                                                  }
                                                                  </style>
                                                                @endforelse


                                                              </tbody>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    {{-- catheter --}}

                                                    {{-- other --}}
                                                            <div id="hidecolostomy" class="col-lg-6 mb-4">
                                                              <div class="card">
                                                                <div class="card-body">
                                                                    <h5 class="card-title mb-4">
                                                                      <img width="40px" src="../img/icon/note.png" alt="">
                                                                      &nbsp;&nbsp; กิจกรรมอื่นๆ 7 วันที่ผ่านมา</h5>


                                                                  <div class="table-responsive" >
                                                                    <table class="table center-aligned-table">
                                                                      <thead>
                                                                        <tr class="text-primary">
                                                                          <th>วันเวลา</th>
                                                                          <th>กิจกรรม</th>
                                                                          <th></th>
                                                                          {{-- <th></th> --}}
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>

                                                                        @forelse ($showother7d as $other7d)
                                                                          <tr class="">
                                                                            <td>{{$other7d['date_time']}}</td>
                                                                            <td>{{$other7d['name_ac']}}</td>
                                                                            <td></td>
                                                                            {{-- <td><a href="#" class="btn btn-primary btn-sm">Manage</a></td> --}}
                                                                            {{-- <td><a href="#" class="btn btn-danger btn-sm">Remove</a></td> --}}
                                                                          </tr>
                                                                        @empty
                                                                          <style>
                                                                          #hidecolostomy {

                                                                              display: none;
                                                                          }
                                                                          </style>
                                                                        @endforelse


                                                                      </tbody>
                                                                    </table>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            {{-- other --}}
                                                    </div>


          </div>
        </div>
        </div>
            {{-- <script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script> --}}
@endsection
