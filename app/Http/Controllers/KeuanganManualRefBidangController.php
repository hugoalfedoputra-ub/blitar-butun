<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefBidang;


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
        return view('pages.keuangan_manual_ref_bidang.index', ['records' => KeuanganManualRefBidang::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidang  $keuanganmanualrefbidang
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefBidang $keuanganmanualrefbidang)
    {
        return view('pages.keuangan_manual_ref_bidang.show', [
                'record' =>$keuanganmanualrefbidang,
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
            'model' => new KeuanganManualRefBidang,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefBidang;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefBidang saved successfully');
            return redirect()->route('keuangan_manual_ref_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefBidang');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidang  $keuanganmanualrefbidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefBidang $keuanganmanualrefbidang)
    {

        return view('pages.keuangan_manual_ref_bidang.edit', [
            'model' => $keuanganmanualrefbidang,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidang  $keuanganmanualrefbidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefBidang $keuanganmanualrefbidang)
    {
        $keuanganmanualrefbidang->fill($request->all());

        if ($keuanganmanualrefbidang->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefBidang successfully updated');
            return redirect()->route('keuangan_manual_ref_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefBidang');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefBidang  $keuanganmanualrefbidang
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefBidang $keuanganmanualrefbidang)
    {
        if ($keuanganmanualrefbidang->delete()) {
                session()->flash('app_message', 'KeuanganManualRefBidang successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefBidang');
            }

        return redirect()->back();
    }
}
