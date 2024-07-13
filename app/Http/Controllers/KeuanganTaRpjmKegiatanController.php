<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmKegiatan;
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
        return KeuanganTaRpjmKegiatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatan  $keuangantarpjmkegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmKegiatan $keuangantarpjmkegiatan)
    {
        return view('pages.keuangan_ta_rpjm_kegiatan.show', [
                'record' =>$keuangantarpjmkegiatan,
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
            'model' => new KeuanganTaRpjmKegiatan,
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
        $model=new KeuanganTaRpjmKegiatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmKegiatan saved successfully');
            return redirect()->route('keuangan_ta_rpjm_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmKegiatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatan  $keuangantarpjmkegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmKegiatan $keuangantarpjmkegiatan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_kegiatan.edit', [
            'model' => $keuangantarpjmkegiatan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatan  $keuangantarpjmkegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmKegiatan $keuangantarpjmkegiatan)
    {
        $keuangantarpjmkegiatan->fill($request->all());

        if ($keuangantarpjmkegiatan->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmKegiatan successfully updated');
            return redirect()->route('keuangan_ta_rpjm_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmKegiatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmKegiatan  $keuangantarpjmkegiatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmKegiatan $keuangantarpjmkegiatan)
    {
        if ($keuangantarpjmkegiatan->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmKegiatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmKegiatan');
            }

        return redirect()->back();
    }
}
