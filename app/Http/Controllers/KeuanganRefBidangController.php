<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBidangModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_bidang.index', ['records' => KeuanganRefBidangModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidangModel  $keuanganrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBidangModel $keuanganrefbidangmodel)
    {
        return view('pages.keuangan_ref_bidang.show', [
                'record' =>$keuanganrefbidangmodel,
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

        return view('pages.keuangan_ref_bidang.create', [
            'model' => new KeuanganRefBidangModel,
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
        $model=new KeuanganRefBidangModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBidangModel saved successfully');
            return redirect()->route('keuangan_ref_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBidangModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidangModel  $keuanganrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBidangModel $keuanganrefbidangmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bidang.edit', [
            'model' => $keuanganrefbidangmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidangModel  $keuanganrefbidangmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBidangModel $keuanganrefbidangmodel)
    {
        $keuanganrefbidangmodel->fill($request->all());

        if ($keuanganrefbidangmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefBidangModel successfully updated');
            return redirect()->route('keuangan_ref_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBidangModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidangModel  $keuanganrefbidangmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBidangModel $keuanganrefbidangmodel)
    {
        if ($keuanganrefbidangmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefBidangModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBidangModel');
            }

        return redirect()->back();
    }
}
