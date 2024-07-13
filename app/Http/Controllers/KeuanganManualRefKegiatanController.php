<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefKegiatanModel;


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
        return view('pages.keuangan_manual_ref_kegiatan.index', ['records' => KeuanganManualRefKegiatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatanModel  $keuanganmanualrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRefKegiatanModel $keuanganmanualrefkegiatanmodel)
    {
        return view('pages.keuangan_manual_ref_kegiatan.show', [
                'record' =>$keuanganmanualrefkegiatanmodel,
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
            'model' => new KeuanganManualRefKegiatanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefKegiatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefKegiatanModel saved successfully');
            return redirect()->route('keuangan_manual_ref_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefKegiatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatanModel  $keuanganmanualrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefKegiatanModel $keuanganmanualrefkegiatanmodel)
    {

        return view('pages.keuangan_manual_ref_kegiatan.edit', [
            'model' => $keuanganmanualrefkegiatanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatanModel  $keuanganmanualrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefKegiatanModel $keuanganmanualrefkegiatanmodel)
    {
        $keuanganmanualrefkegiatanmodel->fill($request->all());

        if ($keuanganmanualrefkegiatanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefKegiatanModel successfully updated');
            return redirect()->route('keuangan_manual_ref_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefKegiatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefKegiatanModel  $keuanganmanualrefkegiatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefKegiatanModel $keuanganmanualrefkegiatanmodel)
    {
        if ($keuanganmanualrefkegiatanmodel->delete()) {
                session()->flash('app_message', 'KeuanganManualRefKegiatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefKegiatanModel');
            }

        return redirect()->back();
    }
}
