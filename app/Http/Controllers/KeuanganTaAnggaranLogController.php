<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaranLogModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaAnggaranLogController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaAnggaranLogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_anggaran_log.index', ['records' => KeuanganTaAnggaranLogModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLogModel  $keuangantaanggaranlogmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaAnggaranLogModel $keuangantaanggaranlogmodel)
    {
        return view('pages.keuangan_ta_anggaran_log.show', [
                'record' =>$keuangantaanggaranlogmodel,
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

        return view('pages.keuangan_ta_anggaran_log.create', [
            'model' => new KeuanganTaAnggaranLogModel,
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
        $model=new KeuanganTaAnggaranLogModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranLogModel saved successfully');
            return redirect()->route('keuangan_ta_anggaran_log.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaranLogModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLogModel  $keuangantaanggaranlogmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaranLogModel $keuangantaanggaranlogmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran_log.edit', [
            'model' => $keuangantaanggaranlogmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLogModel  $keuangantaanggaranlogmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaranLogModel $keuangantaanggaranlogmodel)
    {
        $keuangantaanggaranlogmodel->fill($request->all());

        if ($keuangantaanggaranlogmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranLogModel successfully updated');
            return redirect()->route('keuangan_ta_anggaran_log.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaranLogModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLogModel  $keuangantaanggaranlogmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaranLogModel $keuangantaanggaranlogmodel)
    {
        if ($keuangantaanggaranlogmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaranLogModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaranLogModel');
            }

        return redirect()->back();
    }
}
