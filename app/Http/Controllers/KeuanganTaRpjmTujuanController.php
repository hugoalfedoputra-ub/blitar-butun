<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmTujuan;
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
        return view('pages.keuangan_ta_rpjm_tujuan.index', ['records' => KeuanganTaRpjmTujuan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuan  $keuangantarpjmtujuan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmTujuan $keuangantarpjmtujuan)
    {
        return view('pages.keuangan_ta_rpjm_tujuan.show', [
                'record' =>$keuangantarpjmtujuan,
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
            'model' => new KeuanganTaRpjmTujuan,
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
        $model=new KeuanganTaRpjmTujuan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmTujuan saved successfully');
            return redirect()->route('keuangan_ta_rpjm_tujuan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmTujuan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuan  $keuangantarpjmtujuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmTujuan $keuangantarpjmtujuan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_tujuan.edit', [
            'model' => $keuangantarpjmtujuan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuan  $keuangantarpjmtujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmTujuan $keuangantarpjmtujuan)
    {
        $keuangantarpjmtujuan->fill($request->all());

        if ($keuangantarpjmtujuan->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmTujuan successfully updated');
            return redirect()->route('keuangan_ta_rpjm_tujuan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmTujuan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmTujuan  $keuangantarpjmtujuan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmTujuan $keuangantarpjmtujuan)
    {
        if ($keuangantarpjmtujuan->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmTujuan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmTujuan');
            }

        return redirect()->back();
    }
}
