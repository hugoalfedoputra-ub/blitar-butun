<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaJurnalUmumModel;
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
        return view('pages.keuangan_ta_jurnal_umum.index', ['records' => KeuanganTaJurnalUmumModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumModel  $keuangantajurnalumummodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaJurnalUmumModel $keuangantajurnalumummodel)
    {
        return view('pages.keuangan_ta_jurnal_umum.show', [
                'record' =>$keuangantajurnalumummodel,
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
            'model' => new KeuanganTaJurnalUmumModel,
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
        $model=new KeuanganTaJurnalUmumModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumModel saved successfully');
            return redirect()->route('keuangan_ta_jurnal_umum.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaJurnalUmumModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumModel  $keuangantajurnalumummodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaJurnalUmumModel $keuangantajurnalumummodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_jurnal_umum.edit', [
            'model' => $keuangantajurnalumummodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumModel  $keuangantajurnalumummodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaJurnalUmumModel $keuangantajurnalumummodel)
    {
        $keuangantajurnalumummodel->fill($request->all());

        if ($keuangantajurnalumummodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumModel successfully updated');
            return redirect()->route('keuangan_ta_jurnal_umum.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaJurnalUmumModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumModel  $keuangantajurnalumummodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaJurnalUmumModel $keuangantajurnalumummodel)
    {
        if ($keuangantajurnalumummodel->delete()) {
                session()->flash('app_message', 'KeuanganTaJurnalUmumModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaJurnalUmumModel');
            }

        return redirect()->back();
    }
}
