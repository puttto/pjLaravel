<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class DetialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $Patient = Patient::all();
      $data = array(
        'Patient'=>$Patient
      );

        return view('detail',$data);
        dd($detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
         // if($id !== ''){
         //   dd("1111");
         //   $Patient = Patient::find($id);
         //   //dd();
         // }

         //$Patient = Patient::Where('id_patients',$id)->get();


         // $Patient = Patient::all();
         // $data = array(
         //   'Patient'=>$Patient
         // );
       //test
         if($id !== ''){
            //dd($id);
           $Patient = Patient::Where('id_patients',$id)->get();
           //dd($Patient);

           $data = array('detail'=>$Patient);
         //  dd($data);

         }
           return view('detail',$data);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // if($id !== ''){
      //   // dd($id);
      //   $Patient = Patient::Where('id_patients',$id)->get();
      //   //dd($Patient);
      //
      //   $data = array('detail'=>$Patient);
      // //  dd($data);
      //
      // }
      //   return view('detail',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
