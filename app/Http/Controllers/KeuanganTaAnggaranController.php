<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaran;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaAnggaranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaAnggaranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_anggaran.index', ['records' => KeuanganTaAnggaran::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaran  $keuangantaanggaran
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaAnggaran $keuangantaanggaran)
    {
        return view('pages.keuangan_ta_anggaran.show', [
                'record' =>$keuangantaanggaran,
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

        return view('pages.keuangan_ta_anggaran.create', [
            'model' => new KeuanganTaAnggaran,
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
        $model=new KeuanganTaAnggaran;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaran saved successfully');
            return redirect()->route('keuangan_ta_anggaran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaran');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaran  $keuangantaanggaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaran $keuangantaanggaran)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran.edit', [
            'model' => $keuangantaanggaran,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaran  $keuangantaanggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaran $keuangantaanggaran)
    {
        $keuangantaanggaran->fill($request->all());

        if ($keuangantaanggaran->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaran successfully updated');
            return redirect()->route('keuangan_ta_anggaran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaran');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaran  $keuangantaanggaran
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaran $keuangantaanggaran)
    {
        if ($keuangantaanggaran->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaran successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaran');
            }

        return redirect()->back();
    }
}
