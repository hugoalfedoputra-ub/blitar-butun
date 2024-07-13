<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmBidangModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_bidang.index', ['records' => KeuanganTaRpjmBidangModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidangModel  $keuangantarpjmbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmBidangModel $keuangantarpjmbidangmodel)
    {
        return view('pages.keuangan_ta_rpjm_bidang.show', [
                'record' =>$keuangantarpjmbidangmodel,
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

        return view('pages.keuangan_ta_rpjm_bidang.create', [
            'model' => new KeuanganTaRpjmBidangModel,
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
        $model=new KeuanganTaRpjmBidangModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmBidangModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmBidangModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidangModel  $keuangantarpjmbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmBidangModel $keuangantarpjmbidangmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_bidang.edit', [
            'model' => $keuangantarpjmbidangmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidangModel  $keuangantarpjmbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmBidangModel $keuangantarpjmbidangmodel)
    {
        $keuangantarpjmbidangmodel->fill($request->all());

        if ($keuangantarpjmbidangmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmBidangModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmBidangModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidangModel  $keuangantarpjmbidangmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmBidangModel $keuangantarpjmbidangmodel)
    {
        if ($keuangantarpjmbidangmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmBidangModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmBidangModel');
            }

        return redirect()->back();
    }
}
