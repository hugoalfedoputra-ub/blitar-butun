<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek3;


/**
 * Description of KeuanganManualRefRek3Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefRek3Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_ref_rek3.index', ['records' => KeuanganManualRefRek3::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3  $keuanganmanualrefrek3
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefRek3 $keuanganmanualrefrek3)
    {
        return view('pages.keuangan_manual_ref_rek3.show', [
                'record' =>$keuanganmanualrefrek3,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_rek3.create', [
            'model' => new KeuanganManualRefRek3,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek3;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek3 saved successfully');
            return redirect()->route('keuangan_manual_ref_rek3.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek3');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3  $keuanganmanualrefrek3
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek3 $keuanganmanualrefrek3)
    {

        return view('pages.keuangan_manual_ref_rek3.edit', [
            'model' => $keuanganmanualrefrek3,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3  $keuanganmanualrefrek3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek3 $keuanganmanualrefrek3)
    {
        $keuanganmanualrefrek3->fill($request->all());

        if ($keuanganmanualrefrek3->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek3 successfully updated');
            return redirect()->route('keuangan_manual_ref_rek3.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek3');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3  $keuanganmanualrefrek3
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek3 $keuanganmanualrefrek3)
    {
        if ($keuanganmanualrefrek3->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek3 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek3');
            }

        return redirect()->back();
    }
}
