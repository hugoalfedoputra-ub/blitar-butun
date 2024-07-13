<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefDesaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_desa.index', ['records' => KeuanganRefDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesaModel  $keuanganrefdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefDesaModel $keuanganrefdesamodel)
    {
        return view('pages.keuangan_ref_desa.show', [
                'record' =>$keuanganrefdesamodel,
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

        return view('pages.keuangan_ref_desa.create', [
            'model' => new KeuanganRefDesaModel,
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
        $model=new KeuanganRefDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefDesaModel saved successfully');
            return redirect()->route('keuangan_ref_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesaModel  $keuanganrefdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefDesaModel $keuanganrefdesamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_desa.edit', [
            'model' => $keuanganrefdesamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesaModel  $keuanganrefdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefDesaModel $keuanganrefdesamodel)
    {
        $keuanganrefdesamodel->fill($request->all());

        if ($keuanganrefdesamodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefDesaModel successfully updated');
            return redirect()->route('keuangan_ref_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesaModel  $keuanganrefdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefDesaModel $keuanganrefdesamodel)
    {
        if ($keuanganrefdesamodel->delete()) {
                session()->flash('app_message', 'KeuanganRefDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefDesaModel');
            }

        return redirect()->back();
    }
}
