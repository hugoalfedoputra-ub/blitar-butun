<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefBidangModel;


/**
 * Description of KeuanganManualRefBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_ref_bidang.index', ['records' => KeuanganManualRefBidangModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidangModel  $keuanganmanualrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefBidangModel $keuanganmanualrefbidangmodel)
    {
        return view('pages.keuangan_manual_ref_bidang.show', [
                'record' =>$keuanganmanualrefbidangmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_bidang.create', [
            'model' => new KeuanganManualRefBidangModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefBidangModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefBidangModel saved successfully');
            return redirect()->route('keuangan_manual_ref_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefBidangModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidangModel  $keuanganmanualrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefBidangModel $keuanganmanualrefbidangmodel)
    {

        return view('pages.keuangan_manual_ref_bidang.edit', [
            'model' => $keuanganmanualrefbidangmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidangModel  $keuanganmanualrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefBidangModel $keuanganmanualrefbidangmodel)
    {
        $keuanganmanualrefbidangmodel->fill($request->all());

        if ($keuanganmanualrefbidangmodel->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefBidangModel successfully updated');
            return redirect()->route('keuangan_manual_ref_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefBidangModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidangModel  $keuanganmanualrefbidangmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefBidangModel $keuanganmanualrefbidangmodel)
    {
        if ($keuanganmanualrefbidangmodel->delete()) {
                session()->flash('app_message', 'KeuanganManualRefBidangModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefBidangModel');
            }

        return redirect()->back();
    }
}
