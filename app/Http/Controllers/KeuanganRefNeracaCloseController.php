<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefNeracaCloseModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefNeracaCloseController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefNeracaCloseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_neraca_close.index', ['records' => KeuanganRefNeracaCloseModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaCloseModel  $keuanganrefneracaclosemodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefNeracaCloseModel $keuanganrefneracaclosemodel)
    {
        return view('pages.keuangan_ref_neraca_close.show', [
                'record' =>$keuanganrefneracaclosemodel,
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

        return view('pages.keuangan_ref_neraca_close.create', [
            'model' => new KeuanganRefNeracaCloseModel,
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
        $model=new KeuanganRefNeracaCloseModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefNeracaCloseModel saved successfully');
            return redirect()->route('keuangan_ref_neraca_close.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefNeracaCloseModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaCloseModel  $keuanganrefneracaclosemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefNeracaCloseModel $keuanganrefneracaclosemodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_neraca_close.edit', [
            'model' => $keuanganrefneracaclosemodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaCloseModel  $keuanganrefneracaclosemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefNeracaCloseModel $keuanganrefneracaclosemodel)
    {
        $keuanganrefneracaclosemodel->fill($request->all());

        if ($keuanganrefneracaclosemodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefNeracaCloseModel successfully updated');
            return redirect()->route('keuangan_ref_neraca_close.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefNeracaCloseModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaCloseModel  $keuanganrefneracaclosemodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefNeracaCloseModel $keuanganrefneracaclosemodel)
    {
        if ($keuanganrefneracaclosemodel->delete()) {
                session()->flash('app_message', 'KeuanganRefNeracaCloseModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefNeracaCloseModel');
            }

        return redirect()->back();
    }
}
