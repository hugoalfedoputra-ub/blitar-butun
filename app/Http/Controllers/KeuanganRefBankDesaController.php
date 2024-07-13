<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBankDesaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBankDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBankDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_bank_desa.index', ['records' => KeuanganRefBankDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesaModel  $keuanganrefbankdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBankDesaModel $keuanganrefbankdesamodel)
    {
        return view('pages.keuangan_ref_bank_desa.show', [
                'record' =>$keuanganrefbankdesamodel,
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

        return view('pages.keuangan_ref_bank_desa.create', [
            'model' => new KeuanganRefBankDesaModel,
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
        $model=new KeuanganRefBankDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBankDesaModel saved successfully');
            return redirect()->route('keuangan_ref_bank_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBankDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesaModel  $keuanganrefbankdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBankDesaModel $keuanganrefbankdesamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bank_desa.edit', [
            'model' => $keuanganrefbankdesamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesaModel  $keuanganrefbankdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBankDesaModel $keuanganrefbankdesamodel)
    {
        $keuanganrefbankdesamodel->fill($request->all());

        if ($keuanganrefbankdesamodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefBankDesaModel successfully updated');
            return redirect()->route('keuangan_ref_bank_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBankDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesaModel  $keuanganrefbankdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBankDesaModel $keuanganrefbankdesamodel)
    {
        if ($keuanganrefbankdesamodel->delete()) {
                session()->flash('app_message', 'KeuanganRefBankDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBankDesaModel');
            }

        return redirect()->back();
    }
}
