<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;  //usemodel

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('customer');
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
        // $this->validate($request,[
        //   'Name'=> 'required|max:100',
        //   'Lastname'=> 'required|max:100',
        //   'Telephone'=> 'required|max:100',
        // ]);

        // $Customer = new Customer;
        //
        // $Customer ->name_cus = $request->Name;
        //   $Customer->lastname_cus = $request->Lastname;
        //     $Customer->telephone_cus = $request->Telephone;
        //     $Customer->mobilephone_cus = $request->Mobilephone;
        //     $Customer->address_cus = $request->Address;
        //     $Customer->lineid_cus = $request->Lineid;
        //     $Customer->id_card_cus = $request->ID_card_cus;
        //     $Customer->email_cus = $request->Email;
        //     $Customer ->save();
        //     return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
