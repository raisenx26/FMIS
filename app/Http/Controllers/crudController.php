<?php

namespace App\Http\Controllers;

use App\PayeeTable;
use App\RCTable;
use App\Registries;
use App\UACSTable;
use Illuminate\Http\Request;
use PDF;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        /* $finalorsnum = request()->reg_ors . request()->reg_ors2; */
        /* dd($finalorsnum); */
        /* Store data to Registry Table */
        $registry = new Registries;
        $registry->reg_refnum = request()->reg_refnum;
        $registry->reg_date = request()->reg_date;
        $registry->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $registry->reg_payee = request()->reg_payee;
        $registry->reg_rc = request()->reg_rc;
        $registry->reg_pap = request()->reg_pap;
        $registry->reg_uacs = request()->reg_uacs;
        $registry->reg_amount = request()->reg_amount;
        $registry->reg_particulars = request()->reg_particulars;
        $registry->reg_subaccode = request()->reg_subaccode;
        $registry->reg_remarks = request()->reg_remarks;
        $registry->timestamps = request()->timestamps;
        $registry->save();
        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function edit($reg_refnum)
    {
        $editdata = Registries::find($reg_refnum);
        $regform = Registries::all();
        $rc_data = RCTable::all();
        $payee_data = PayeeTable::all();
        $uacs_data = UACSTable::all();
        return view('registryedit', compact('rc_data', 'payee_data', 'uacs_data', 'editdata', 'regform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function update($reg_refnum)
    {
        $updatedata = Registries::find($reg_refnum);

        $updatedata->reg_date = request()->reg_date;
        $updatedata->reg_orsnum = request()->reg_ors . request()->reg_ors2;
        $updatedata->reg_payee = request()->reg_payee;
        $updatedata->reg_rc = request()->reg_rc;
        $updatedata->reg_pap = request()->reg_pap;
        $updatedata->reg_uacs = request()->reg_uacs;
        $updatedata->reg_amount = request()->reg_amount;
        $updatedata->reg_particulars = request()->reg_particulars;
        $updatedata->reg_subaccode = request()->reg_subaccode;
        $updatedata->reg_remarks = request()->reg_remarks;
        $updatedata->timestamps = request()->timestamps;
        $updatedata->save();
        return redirect('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $reg_refnum
     * @return \Illuminate\Http\Response
     */
    public function destroy($reg_refnum)
    {
        $deletedata = Registries::find($reg_refnum);
        $deletedata->delete();
        return redirect('home');
    }
    public function viewpage()
    {
        $rc_data = Registries::all();
        $payee_data = PayeeTable::all();
        $uacs_data = UACSTable::all();
        return view('/components/Registry', compact('rc_data', 'payee_data', 'uacs_data'));
    }
    public function printdata($reg_refnum)
    {
        $dataid = Registries::find($reg_refnum);
        $rc_data = Registries::all();
        PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadview('components.printview.pdf_print', compact('rc_data', 'dataid'));
        return $pdf->stream('timoy.pdf');
    }
}
