<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek1Model;


/**
 * Description of KeuanganManualRefRek1Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefRek1Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_ref_rek1.index', ['records' => KeuanganManualRefRek1Model::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1Model  $keuanganmanualrefrek1model
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefRek1Model $keuanganmanualrefrek1model)
    {
        return view('pages.keuangan_manual_ref_rek1.show', [
                'record' =>$keuanganmanualrefrek1model,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_rek1.create', [
            'model' => new KeuanganManualRefRek1Model,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek1Model;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek1Model saved successfully');
            return redirect()->route('keuangan_manual_ref_rek1.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek1Model');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1Model  $keuanganmanualrefrek1model
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek1Model $keuanganmanualrefrek1model)
    {

        return view('pages.keuangan_manual_ref_rek1.edit', [
            'model' => $keuanganmanualrefrek1model,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1Model  $keuanganmanualrefrek1model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek1Model $keuanganmanualrefrek1model)
    {
        $keuanganmanualrefrek1model->fill($request->all());

        if ($keuanganmanualrefrek1model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek1Model successfully updated');
            return redirect()->route('keuangan_manual_ref_rek1.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek1Model');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1Model  $keuanganmanualrefrek1model
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek1Model $keuanganmanualrefrek1model)
    {
        if ($keuanganmanualrefrek1model->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek1Model successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek1Model');
            }

        return redirect()->back();
    }
}
