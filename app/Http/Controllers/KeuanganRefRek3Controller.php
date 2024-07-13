<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek3Model;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek3Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek3Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_rek3.index', ['records' => KeuanganRefRek3Model::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3Model  $keuanganrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefRek3Model $keuanganrefrek3model)
    {
        return view('pages.keuangan_ref_rek3.show', [
                'record' =>$keuanganrefrek3model,
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

        return view('pages.keuangan_ref_rek3.create', [
            'model' => new KeuanganRefRek3Model,
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
        $model=new KeuanganRefRek3Model;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek3Model saved successfully');
            return redirect()->route('keuangan_ref_rek3.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek3Model');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3Model  $keuanganrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek3Model $keuanganrefrek3model)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek3.edit', [
            'model' => $keuanganrefrek3model,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3Model  $keuanganrefrek3model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek3Model $keuanganrefrek3model)
    {
        $keuanganrefrek3model->fill($request->all());

        if ($keuanganrefrek3model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek3Model successfully updated');
            return redirect()->route('keuangan_ref_rek3.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek3Model');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3Model  $keuanganrefrek3model
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek3Model $keuanganrefrek3model)
    {
        if ($keuanganrefrek3model->delete()) {
                session()->flash('app_message', 'KeuanganRefRek3Model successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek3Model');
            }

        return redirect()->back();
    }
}
