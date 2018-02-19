<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthcaregiverController extends Controller
{
      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth:caregiver');

      }
      /**
       * Create a new controller instance.
       *
       * @return\Illuminate\Http\Response
       */
      public function index()
      {
          return view('dashcaregiver');
      }
}
