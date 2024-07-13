<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmKegiatanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_kegiatan.index', ['records' => KeuanganTaRpjmKegiatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatanModel  $keuangantarpjmkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmKegiatanModel $keuangantarpjmkegiatanmodel)
    {
        return view('pages.keuangan_ta_rpjm_kegiatan.show', [
                'record' =>$keuangantarpjmkegiatanmodel,
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

        return view('pages.keuangan_ta_rpjm_kegiatan.create', [
            'model' => new KeuanganTaRpjmKegiatanModel,
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
        $model=new KeuanganTaRpjmKegiatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmKegiatanModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmKegiatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatanModel  $keuangantarpjmkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmKegiatanModel $keuangantarpjmkegiatanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_kegiatan.edit', [
            'model' => $keuangantarpjmkegiatanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatanModel  $keuangantarpjmkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmKegiatanModel $keuangantarpjmkegiatanmodel)
    {
        $keuangantarpjmkegiatanmodel->fill($request->all());

        if ($keuangantarpjmkegiatanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmKegiatanModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmKegiatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatanModel  $keuangantarpjmkegiatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmKegiatanModel $keuangantarpjmkegiatanmodel)
    {
        if ($keuangantarpjmkegiatanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmKegiatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmKegiatanModel');
            }

        return redirect()->back();
    }
}
