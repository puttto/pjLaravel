<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Caregiver</title>
  <link rel="stylesheet" href={{asset('dashboard/node_modules/font-awesome/css/font-awesome.min.css')}} />
  <link rel="stylesheet" href={{asset('dashboard/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}} />
  <link rel="stylesheet" href={{asset('dashboard/node_modules/flag-icon-css/css/flag-icon.min.css')}} />
  <link rel="stylesheet" href={{asset('dashboard/css/style.css')}} />
  <link rel="shortcut icon" href={{asset('dashboard/images/favicon.png')}} />
  {{Html::style(('css/Simple-User-Profile.css'))}}

  <style >
  .img-circle{border-radius:50%}
  .img-responsive{display:block;max-width:100%;height:auto}
  </style>

  {{Html::script (('dashboard/node_modules/jquery/dist/jquery.min.js'))}}
  {{Html::script (('dashboard/node_modules/popper.js/dist/umd/popper.min.js'))}}
  {{Html::script (('dashboard/node_modules/bootstrap/dist/js/bootstrap.min.js'))}}
  {{Html::script (('dashboard/node_modules/chart.js/dist/Chart.min.js'))}}
  {{Html::script (('dashboard/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js'))}}

  {{Html::script (('dashboard/js/off-canvas.js'))}}
  {{Html::script (('dashboard/js/misc.js'))}}
  {{Html::script (('dashboard/js/hoverable-collapse.js'))}}
  {{Html::script (('dashboard/js/chart.js'))}}
  {{Html::script (('dashboard/js/maps.js'))}}
</head>

<body>

  <div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="bg-white text-center navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src={{asset('../dashboard/images/logo_nav.png')}} /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src={{asset('../dashboard/images/logo_nav_mini.png')}} alt=""></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
          <span class="navbar-toggler-icon"></span>
        </button>
        <form class="form-inline mt-2 mt-md-0 d-none d-lg-block">
          <input class="form-control mr-sm-2 search" type="text" placeholder="Search">
        </form>

        {{-- @guest
          <ul>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
          </ul>
        @else
          <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row nav">
            <li class="nav-item">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" aria-haspopup="true">
                    {{ Auth::user()->name }}

                </a>
                      <li class="nav-item action" >
                        <i class="fa fa-1x fa-key text-primary2 mb-3 sr-icons"></i>
                          <a class="nav-item" style="color:#f05f40;" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
            </li>
            </ul>
        @endguest --}}

        <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
          <div class="user-info">
            <img src={{asset('dashboard/images/face.jpg')}} alt="">
            <p class="name">{{ Auth::user()->name }}</p>
            {{-- <p class="designation">Manager</p> --}}
            <span class="online"></span>
          </div>
          <ul class="nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">
                {{-- <img src="dashboard/images/icons/1.png" alt=""> --}}
                <i class="fa fa-2x fa-home text-primary mb-3 sr-icons"></i>
                <span class="menu-title">หน้าแรก</span>
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="pages/widgets.html">
                {{-- <img src="dashboard/images/icons/2.png" alt=""> --}}
                <i class="fa fa-2x fa-list-ol text-primary mb-3 sr-icons"></i>
                <span class="menu-title">เพิ่มบันทึกการดูแล</span>
              </a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="pages/forms/index.html">
                <i class="fa fa-2x fa-ambulance text-primary mb-3 sr-icons"></i>
              {{-- <img src="dashboard/images/icons/005-forms.png" alt=""> --}}
                <span class="menu-title">แจ้งเตือนฉุกเฉิน</span>
              </a>
            </li>
          {{--   <li class="nav-item active">
              <a class="nav-link" href="pages/ui-elements/buttons.html">
                 <img src="dashboard/images/icons/4.png" alt="">
                <i class="fa fa-2x fa-ambulance text-primary mb-3 sr-icons"></i>
                <span class="menu-title">แจ้งเตือนฉุกเฉิน</span>
              </a>
            </li> --}}


            {{-- <li class="nav-item">
              <a class="nav-link" href="pages/tables/index.html">
                <img src="dashboard/images/icons/5.png" alt="">
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/index.html">
                <img src="dashboard/images/icons/6.png" alt="">
                <span class="menu-title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/pages/icons/index.html">
                <img src="dashboard/images/icons/7.png" alt="">
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/pages/ui-elements/typography.html">
                <img src="dashboard/images/icons/8.png" alt="">
                <span class="menu-title">Typography</span>
              </a>
            </li>--}}


            {{-- <li class="nav-item active">
              <a class="nav-link" data-toggle="collapse" href="#sample-pages" aria-expanded="false" aria-controls="sample-pages">

                  <i class="fa fa-2x fa-users text-primary mb-3 sr-icons"></i>
                <span class="menu-title">ข้อมูลบัญชีผู้ใช้ <i class="fa fa-sort-down"></i></span>
              </a>
              <div class="collapse" id="sample-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="">
                      ผู้ดูแล
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="">
                      คนไข้
                    </a>
                  </li>
                </ul>
              </div>
            </li> --}}

          </ul>
        </nav>

@yield('content')
<!-- partial:partials/_footer.html -->
                 <footer class="footer">
                  <div class="container-fluid clearfix">
                    <span class="float-right">
                        <a href="#">Sukjai Intergroup.</a> &copy; 2018
                    </span>
                  </div>
                </footer>

<!-- partial -->
      </div>
      </div>


</div>



  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script> --}}


</body>

</html>
