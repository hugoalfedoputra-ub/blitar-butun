<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaranModel;
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
        return view('pages.keuangan_ta_anggaran.index', ['records' => KeuanganTaAnggaranModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranModel  $keuangantaanggaranmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaAnggaranModel $keuangantaanggaranmodel)
    {
        return view('pages.keuangan_ta_anggaran.show', [
                'record' =>$keuangantaanggaranmodel,
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
            'model' => new KeuanganTaAnggaranModel,
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
        $model=new KeuanganTaAnggaranModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranModel saved successfully');
            return redirect()->route('keuangan_ta_anggaran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaranModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranModel  $keuangantaanggaranmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaranModel $keuangantaanggaranmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran.edit', [
            'model' => $keuangantaanggaranmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranModel  $keuangantaanggaranmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaranModel $keuangantaanggaranmodel)
    {
        $keuangantaanggaranmodel->fill($request->all());

        if ($keuangantaanggaranmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranModel successfully updated');
            return redirect()->route('keuangan_ta_anggaran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaranModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranModel  $keuangantaanggaranmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaranModel $keuangantaanggaranmodel)
    {
        if ($keuangantaanggaranmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaranModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaranModel');
            }

        return redirect()->back();
    }
}
