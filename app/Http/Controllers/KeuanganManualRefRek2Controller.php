<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek2Model;


/**
 * Description of KeuanganManualRefRek2Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefRek2Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_ref_rek2.index', ['records' => KeuanganManualRefRek2Model::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2Model  $keuanganmanualrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefRek2Model $keuanganmanualrefrek2model)
    {
        return view('pages.keuangan_manual_ref_rek2.show', [
                'record' =>$keuanganmanualrefrek2model,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_rek2.create', [
            'model' => new KeuanganManualRefRek2Model,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek2Model;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek2Model saved successfully');
            return redirect()->route('keuangan_manual_ref_rek2.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek2Model');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2Model  $keuanganmanualrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek2Model $keuanganmanualrefrek2model)
    {

        return view('pages.keuangan_manual_ref_rek2.edit', [
            'model' => $keuanganmanualrefrek2model,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2Model  $keuanganmanualrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek2Model $keuanganmanualrefrek2model)
    {
        $keuanganmanualrefrek2model->fill($request->all());

        if ($keuanganmanualrefrek2model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek2Model successfully updated');
            return redirect()->route('keuangan_manual_ref_rek2.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek2Model');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2Model  $keuanganmanualrefrek2model
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek2Model $keuanganmanualrefrek2model)
    {
        if ($keuanganmanualrefrek2model->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek2Model successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek2Model');
            }

        return redirect()->back();
    }
}
