<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek1;


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
        return KeuanganManualRefRek1::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1  $keuanganmanualrefrek1
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefRek1 $keuanganmanualrefrek1)
    {
        return view('pages.keuangan_manual_ref_rek1.show', [
                'record' =>$keuanganmanualrefrek1,
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
            'model' => new KeuanganManualRefRek1,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek1;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek1 saved successfully');
            return redirect()->route('keuangan_manual_ref_rek1.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek1');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1  $keuanganmanualrefrek1
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek1 $keuanganmanualrefrek1)
    {

        return view('pages.keuangan_manual_ref_rek1.edit', [
            'model' => $keuanganmanualrefrek1,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1  $keuanganmanualrefrek1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek1 $keuanganmanualrefrek1)
    {
        $keuanganmanualrefrek1->fill($request->all());

        if ($keuanganmanualrefrek1->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek1 successfully updated');
            return redirect()->route('keuangan_manual_ref_rek1.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek1');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek1  $keuanganmanualrefrek1
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek1 $keuanganmanualrefrek1)
    {
        if ($keuanganmanualrefrek1->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek1 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek1');
            }

        return redirect()->back();
    }
}
