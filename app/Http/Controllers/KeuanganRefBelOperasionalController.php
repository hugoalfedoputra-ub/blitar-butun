<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBelOperasionalModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBelOperasionalController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBelOperasionalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_bel_operasional.index', ['records' => KeuanganRefBelOperasionalModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasionalModel  $keuanganrefbeloperasionalmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBelOperasionalModel $keuanganrefbeloperasionalmodel)
    {
        return view('pages.keuangan_ref_bel_operasional.show', [
                'record' =>$keuanganrefbeloperasionalmodel,
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

        return view('pages.keuangan_ref_bel_operasional.create', [
            'model' => new KeuanganRefBelOperasionalModel,
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
        $model=new KeuanganRefBelOperasionalModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBelOperasionalModel saved successfully');
            return redirect()->route('keuangan_ref_bel_operasional.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBelOperasionalModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasionalModel  $keuanganrefbeloperasionalmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBelOperasionalModel $keuanganrefbeloperasionalmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bel_operasional.edit', [
            'model' => $keuanganrefbeloperasionalmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasionalModel  $keuanganrefbeloperasionalmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBelOperasionalModel $keuanganrefbeloperasionalmodel)
    {
        $keuanganrefbeloperasionalmodel->fill($request->all());

        if ($keuanganrefbeloperasionalmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefBelOperasionalModel successfully updated');
            return redirect()->route('keuangan_ref_bel_operasional.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBelOperasionalModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasionalModel  $keuanganrefbeloperasionalmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBelOperasionalModel $keuanganrefbeloperasionalmodel)
    {
        if ($keuanganrefbeloperasionalmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefBelOperasionalModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBelOperasionalModel');
            }

        return redirect()->back();
    }
}
