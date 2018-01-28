<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    {{Html::style(('css/app.css'))}}
    <!-- Bootstrap core CSS -->
  {{-- <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
{{Html::style(('vendor/bootstrap/css/bootstrap.min.css'))}}
  <!-- Custom fonts for this template -->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    {{Html::style(('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'))}}
  {{Html::style(('https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'))}}
  <!-- Plugin CSS -->
  <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">


  {{Html::style(('css\bootstrap-select.min.css'))}}
  {{Html::style(('css\multiselect.min.css'))}}

  {{Html::style(('css\custom.css'))}}


      {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
      {{-- {{Html::style (('vendor/bootstrap/css/bootstrap.min.css'))}} --}}
      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
      {{-- {{Html::script (("vendor/jquery/jquery.min.js"))}} --}}
      {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
      {{-- {{Html::script (('vendor/bootstrap/js/bootstrap.min.js'))}} --}}

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

      <!-- -date- -->
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('src\DateTimePicker.css')}}" /> --}}
        {{Html::style (('src\DateTimePicker.css'))}}
        {{-- <script type="text/javascript" src="{{asset('src\DateTimePicker.js')}}"></script> --}}

        {{-- <!--[if lt IE 9]>
        <link rel="stylesheet" type="text/css" href="{{asset('DateTimePicker-ltie9.css')}}" />
        <script type="text/javascript" src="{{asset('DateTimePicker-ltie9.js')}}"></script>
        <![endif]--> --}}

        <!-- For i18n Support -->
        {{-- <script type="text/javascript" src="{{asset('src\i18n\DateTimePicker-i18n.js')}}"></script> --}}

      <!-- -date- -->

      {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> --}}
      <!-- Latest compiled and minified CSS -->
      {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
      {{-- {{Html::style (('css/bootstrapselct.min.css'))}} --}}

      {{-- <link rel="stylesheet" href="http://harshniketseta.github.io/popupMultiSelect/dist/stylesheets/multiselect.min.css"> --}}
      <!-- Latest compiled and minified JavaScript -->
      {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
      {{-- <script src="http://harshniketseta.github.io/popupMultiSelect/dist/javascripts/multiselect.min.js"></script> --}}

      {{Html::script (('js/bootstrap.min.js'))}}
      {{Html::script (('js/bootstrap-select.min.js'))}}
      {{Html::script (('js/multiselect.min.js'))}}

</head>
<body>
    <div  id="app">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      {{-- <img src="img\logo.png" class="navbar-brand js-scroll-trigger"  alt=""> --}}
      <a class="navbar-brand js-scroll-trigger" href="index">สุขใจ อินเตอร์กรุ๊ป</a>
      <a clsss=" navbar-brand " style="font-size: 16px; " href="tel:+66614844107"> โทร 061-4844107</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">



          <!-- Authentication Links -->
          @guest

              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
          @else
              <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                      {{ Auth::user()->name }}
                      {{-- <span class="caret"></span> --}}
                  </a>

                  <ul class="dropdown-menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endguest
        </ul>

      </div>

    </div>
  </nav>




        @yield('content')
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    <!-- Bootstrap core JavaScript -->

  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
  <script src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>


  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/creative.min.js') }}"></script>
  {{Html::script (('vendor\jquery\jquery.js'))}}

  {{Html::script (('src\DateTimePicker.js'))}}
  {{Html::script (('src\i18n\DateTimePicker-i18n.js'))}}


  <div class="footer">
    <br><br>
  </div>
</body>

  {{-- <!--Footer-->
  <footer class="page-footer" style="background-color:rgba(1, 128, 139, 0.72) ;">

      <!--Footer Links-->
      <div class="container-fluid">
          <div class="row">

              <!--First column-->
              <div class="col-md-12">
                  <h1 class="title"style="color:#fff" >สุขใจ อินเตอร์กรุ๊ป</h1>
                  <p style="color:#fff">บริการดูแลผู้สูงอายุตามบ้าน</p>
              </div>
              <!--/.First column-->

              <!--Second column-->
              <div class="col-md-4">
                  <h5 class="title">Links</h5>
                  <ul>
                      <li><a href="#!">Link 1</a></li>
                      <li><a href="#!">Link 2</a></li>
                      <li><a href="#!">Link 3</a></li>
                      <li><a href="#!">Link 4</a></li>
                  </ul>
              </div>
              <!--/.Second column-->
          </div>
      </div>
      <!--/.Footer Links-->

      <!--Copyright-->
      <div class="footer">
          <div class="container-fluid">
              © 2015 Copyright: <a href="https://www.MDBootstrap.com"> MDBootstrap.com </a>

          </div>
      </div>
      <!--/.Copyright-->

  </footer>
  <!--/.Footer--> --}}

</html>
