<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTriwulanRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTriwulanRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTriwulanRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_triwulan_rinci.index', ['records' => KeuanganTaTriwulanRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinciModel  $keuangantatriwulanrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTriwulanRinciModel $keuangantatriwulanrincimodel)
    {
        return view('pages.keuangan_ta_triwulan_rinci.show', [
                'record' =>$keuangantatriwulanrincimodel,
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

        return view('pages.keuangan_ta_triwulan_rinci.create', [
            'model' => new KeuanganTaTriwulanRinciModel,
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
        $model=new KeuanganTaTriwulanRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanRinciModel saved successfully');
            return redirect()->route('keuangan_ta_triwulan_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTriwulanRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinciModel  $keuangantatriwulanrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTriwulanRinciModel $keuangantatriwulanrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_triwulan_rinci.edit', [
            'model' => $keuangantatriwulanrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinciModel  $keuangantatriwulanrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTriwulanRinciModel $keuangantatriwulanrincimodel)
    {
        $keuangantatriwulanrincimodel->fill($request->all());

        if ($keuangantatriwulanrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanRinciModel successfully updated');
            return redirect()->route('keuangan_ta_triwulan_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTriwulanRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinciModel  $keuangantatriwulanrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTriwulanRinciModel $keuangantatriwulanrincimodel)
    {
        if ($keuangantatriwulanrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaTriwulanRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTriwulanRinciModel');
            }

        return redirect()->back();
    }
}
