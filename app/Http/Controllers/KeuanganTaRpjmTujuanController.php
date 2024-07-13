<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmTujuanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmTujuanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmTujuanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_tujuan.index', ['records' => KeuanganTaRpjmTujuanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuanModel  $keuangantarpjmtujuanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmTujuanModel $keuangantarpjmtujuanmodel)
    {
        return view('pages.keuangan_ta_rpjm_tujuan.show', [
                'record' =>$keuangantarpjmtujuanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_tujuan.create', [
            'model' => new KeuanganTaRpjmTujuanModel,
			"keuangan_master" => $keuangan_master,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganTaRpjmTujuanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmTujuanModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_tujuan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmTujuanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuanModel  $keuangantarpjmtujuanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmTujuanModel $keuangantarpjmtujuanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_tujuan.edit', [
            'model' => $keuangantarpjmtujuanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuanModel  $keuangantarpjmtujuanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmTujuanModel $keuangantarpjmtujuanmodel)
    {
        $keuangantarpjmtujuanmodel->fill($request->all());

        if ($keuangantarpjmtujuanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmTujuanModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_tujuan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmTujuanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuanModel  $keuangantarpjmtujuanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmTujuanModel $keuangantarpjmtujuanmodel)
    {
        if ($keuangantarpjmtujuanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmTujuanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmTujuanModel');
            }

        return redirect()->back();
    }
}
