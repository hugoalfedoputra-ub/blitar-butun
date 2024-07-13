<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaJurnalUmumRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaJurnalUmumRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaJurnalUmumRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_jurnal_umum_rinci.index', ['records' => KeuanganTaJurnalUmumRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinciModel  $keuangantajurnalumumrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaJurnalUmumRinciModel $keuangantajurnalumumrincimodel)
    {
        return view('pages.keuangan_ta_jurnal_umum_rinci.show', [
                'record' =>$keuangantajurnalumumrincimodel,
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

        return view('pages.keuangan_ta_jurnal_umum_rinci.create', [
            'model' => new KeuanganTaJurnalUmumRinciModel,
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
        $model=new KeuanganTaJurnalUmumRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumRinciModel saved successfully');
            return redirect()->route('keuangan_ta_jurnal_umum_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaJurnalUmumRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinciModel  $keuangantajurnalumumrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaJurnalUmumRinciModel $keuangantajurnalumumrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_jurnal_umum_rinci.edit', [
            'model' => $keuangantajurnalumumrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinciModel  $keuangantajurnalumumrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaJurnalUmumRinciModel $keuangantajurnalumumrincimodel)
    {
        $keuangantajurnalumumrincimodel->fill($request->all());

        if ($keuangantajurnalumumrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumRinciModel successfully updated');
            return redirect()->route('keuangan_ta_jurnal_umum_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaJurnalUmumRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinciModel  $keuangantajurnalumumrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaJurnalUmumRinciModel $keuangantajurnalumumrincimodel)
    {
        if ($keuangantajurnalumumrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaJurnalUmumRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaJurnalUmumRinciModel');
            }

        return redirect()->back();
    }
}
