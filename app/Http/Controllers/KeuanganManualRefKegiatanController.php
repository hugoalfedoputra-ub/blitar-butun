<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefKegiatan;


/**
 * Description of KeuanganManualRefKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganManualRefKegiatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatan  $keuanganmanualrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefKegiatan $keuanganmanualrefkegiatan)
    {
        return view('pages.keuangan_manual_ref_kegiatan.show', [
                'record' =>$keuanganmanualrefkegiatan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_kegiatan.create', [
            'model' => new KeuanganManualRefKegiatan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefKegiatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefKegiatan saved successfully');
            return redirect()->route('keuangan_manual_ref_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefKegiatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatan  $keuanganmanualrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefKegiatan $keuanganmanualrefkegiatan)
    {

        return view('pages.keuangan_manual_ref_kegiatan.edit', [
            'model' => $keuanganmanualrefkegiatan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatan  $keuanganmanualrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefKegiatan $keuanganmanualrefkegiatan)
    {
        $keuanganmanualrefkegiatan->fill($request->all());

        if ($keuanganmanualrefkegiatan->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefKegiatan successfully updated');
            return redirect()->route('keuangan_manual_ref_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefKegiatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatan  $keuanganmanualrefkegiatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefKegiatan $keuanganmanualrefkegiatan)
    {
        if ($keuanganmanualrefkegiatan->delete()) {
                session()->flash('app_message', 'KeuanganManualRefKegiatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefKegiatan');
            }

        return redirect()->back();
    }
}
