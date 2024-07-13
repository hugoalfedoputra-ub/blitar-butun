<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTbpModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTbpController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTbpController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_tbp.index', ['records' => KeuanganTaTbpModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpModel  $keuangantatbpmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTbpModel $keuangantatbpmodel)
    {
        return view('pages.keuangan_ta_tbp.show', [
                'record' =>$keuangantatbpmodel,
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

        return view('pages.keuangan_ta_tbp.create', [
            'model' => new KeuanganTaTbpModel,
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
        $model=new KeuanganTaTbpModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpModel saved successfully');
            return redirect()->route('keuangan_ta_tbp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTbpModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpModel  $keuangantatbpmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTbpModel $keuangantatbpmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_tbp.edit', [
            'model' => $keuangantatbpmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpModel  $keuangantatbpmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTbpModel $keuangantatbpmodel)
    {
        $keuangantatbpmodel->fill($request->all());

        if ($keuangantatbpmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpModel successfully updated');
            return redirect()->route('keuangan_ta_tbp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTbpModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpModel  $keuangantatbpmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTbpModel $keuangantatbpmodel)
    {
        if ($keuangantatbpmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaTbpModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTbpModel');
            }

        return redirect()->back();
    }
}
