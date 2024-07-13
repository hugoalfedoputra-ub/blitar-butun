<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaranRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaAnggaranRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaAnggaranRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_anggaran_rinci.index', ['records' => KeuanganTaAnggaranRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinciModel  $keuangantaanggaranrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaAnggaranRinciModel $keuangantaanggaranrincimodel)
    {
        return view('pages.keuangan_ta_anggaran_rinci.show', [
                'record' =>$keuangantaanggaranrincimodel,
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

        return view('pages.keuangan_ta_anggaran_rinci.create', [
            'model' => new KeuanganTaAnggaranRinciModel,
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
        $model=new KeuanganTaAnggaranRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranRinciModel saved successfully');
            return redirect()->route('keuangan_ta_anggaran_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaranRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinciModel  $keuangantaanggaranrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaranRinciModel $keuangantaanggaranrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran_rinci.edit', [
            'model' => $keuangantaanggaranrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinciModel  $keuangantaanggaranrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaranRinciModel $keuangantaanggaranrincimodel)
    {
        $keuangantaanggaranrincimodel->fill($request->all());

        if ($keuangantaanggaranrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranRinciModel successfully updated');
            return redirect()->route('keuangan_ta_anggaran_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaranRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinciModel  $keuangantaanggaranrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaranRinciModel $keuangantaanggaranrincimodel)
    {
        if ($keuangantaanggaranrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaranRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaranRinciModel');
            }

        return redirect()->back();
    }
}
