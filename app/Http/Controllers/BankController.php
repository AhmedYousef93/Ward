<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Flower;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankinfos = Bank::all();
        $products = Flower::all();
        return view('admin.bankinfo.show' , compact('bankinfos' , 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bankinfo.bankinfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bankinfo = new Bank();
        $bankinfo->bank_name = $request->bank_name;
        $bankinfo->acc_owner = $request->acc_owner;
        $bankinfo->epay_number = $request->epay_number;
        $bankinfo->acc_number = $request->acc_number;
        $bankinfo->save();

        return redirect(route('bank_accounts.index'));
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
        $bankinfos = Bank::all();
        $bankinfo = Bank::where('id' , $id)->first();
        return view('admin.bankinfo.edit' , compact('bankinfos' , 'bankinfo'));
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
        $this->validate($request , [
            'bank_name'=> 'required',
            'acc_owner'=> 'required',
            'epay_number'=> 'required',
            'acc_number'=> 'required',
        ]);

        $bankinfo = Bank::find($id);
        $bankinfo->bank_name = $request->bank_name;
        $bankinfo->acc_owner = $request->acc_owner;
        $bankinfo->epay_number = $request->epay_number;
        $bankinfo->acc_number = $request->acc_number;
        $bankinfo->save();



        return redirect(route('bank_accounts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bank::where('id' , $id)->delete();
        return redirect()->back();
    }
}
