<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTbpRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTbpRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTbpRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_tbp_rinci.index', ['records' => KeuanganTaTbpRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinciModel  $keuangantatbprincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTbpRinciModel $keuangantatbprincimodel)
    {
        return view('pages.keuangan_ta_tbp_rinci.show', [
                'record' =>$keuangantatbprincimodel,
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

        return view('pages.keuangan_ta_tbp_rinci.create', [
            'model' => new KeuanganTaTbpRinciModel,
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
        $model=new KeuanganTaTbpRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpRinciModel saved successfully');
            return redirect()->route('keuangan_ta_tbp_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTbpRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinciModel  $keuangantatbprincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTbpRinciModel $keuangantatbprincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_tbp_rinci.edit', [
            'model' => $keuangantatbprincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinciModel  $keuangantatbprincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTbpRinciModel $keuangantatbprincimodel)
    {
        $keuangantatbprincimodel->fill($request->all());

        if ($keuangantatbprincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpRinciModel successfully updated');
            return redirect()->route('keuangan_ta_tbp_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTbpRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinciModel  $keuangantatbprincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTbpRinciModel $keuangantatbprincimodel)
    {
        if ($keuangantatbprincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaTbpRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTbpRinciModel');
            }

        return redirect()->back();
    }
}
