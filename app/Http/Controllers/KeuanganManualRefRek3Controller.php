<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek3Model;


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
        return view('pages.keuangan_manual_ref_rek3.index', ['records' => KeuanganManualRefRek3Model::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3Model  $keuanganmanualrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefRek3Model $keuanganmanualrefrek3model)
    {
        return view('pages.keuangan_manual_ref_rek3.show', [
                'record' =>$keuanganmanualrefrek3model,
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
            'model' => new KeuanganManualRefRek3Model,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek3Model;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek3Model saved successfully');
            return redirect()->route('keuangan_manual_ref_rek3.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek3Model');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3Model  $keuanganmanualrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek3Model $keuanganmanualrefrek3model)
    {

        return view('pages.keuangan_manual_ref_rek3.edit', [
            'model' => $keuanganmanualrefrek3model,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3Model  $keuanganmanualrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek3Model $keuanganmanualrefrek3model)
    {
        $keuanganmanualrefrek3model->fill($request->all());

        if ($keuanganmanualrefrek3model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek3Model successfully updated');
            return redirect()->route('keuangan_manual_ref_rek3.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek3Model');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek3Model  $keuanganmanualrefrek3model
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek3Model $keuanganmanualrefrek3model)
    {
        if ($keuanganmanualrefrek3model->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek3Model successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek3Model');
            }

        return redirect()->back();
    }
}
