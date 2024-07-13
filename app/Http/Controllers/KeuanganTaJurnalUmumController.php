<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaJurnalUmum;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaJurnalUmumController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaJurnalUmumController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaJurnalUmum::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmum  $keuangantajurnalumum
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaJurnalUmum $keuangantajurnalumum)
    {
        return view('pages.keuangan_ta_jurnal_umum.show', [
                'record' =>$keuangantajurnalumum,
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

        return view('pages.keuangan_ta_jurnal_umum.create', [
            'model' => new KeuanganTaJurnalUmum,
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
        $model=new KeuanganTaJurnalUmum;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmum saved successfully');
            return redirect()->route('keuangan_ta_jurnal_umum.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaJurnalUmum');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmum  $keuangantajurnalumum
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaJurnalUmum $keuangantajurnalumum)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_jurnal_umum.edit', [
            'model' => $keuangantajurnalumum,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmum  $keuangantajurnalumum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaJurnalUmum $keuangantajurnalumum)
    {
        $keuangantajurnalumum->fill($request->all());

        if ($keuangantajurnalumum->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmum successfully updated');
            return redirect()->route('keuangan_ta_jurnal_umum.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaJurnalUmum');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmum  $keuangantajurnalumum
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaJurnalUmum $keuangantajurnalumum)
    {
        if ($keuangantajurnalumum->delete()) {
                session()->flash('app_message', 'KeuanganTaJurnalUmum successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaJurnalUmum');
            }

        return redirect()->back();
    }
}
