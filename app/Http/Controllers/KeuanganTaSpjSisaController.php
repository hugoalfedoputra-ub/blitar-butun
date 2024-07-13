<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjSisaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjSisaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjSisaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spj_sisa.index', ['records' => KeuanganTaSpjSisaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisaModel  $keuangantaspjsisamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjSisaModel $keuangantaspjsisamodel)
    {
        return view('pages.keuangan_ta_spj_sisa.show', [
                'record' =>$keuangantaspjsisamodel,
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

        return view('pages.keuangan_ta_spj_sisa.create', [
            'model' => new KeuanganTaSpjSisaModel,
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
        $model=new KeuanganTaSpjSisaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjSisaModel saved successfully');
            return redirect()->route('keuangan_ta_spj_sisa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjSisaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisaModel  $keuangantaspjsisamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjSisaModel $keuangantaspjsisamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_sisa.edit', [
            'model' => $keuangantaspjsisamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisaModel  $keuangantaspjsisamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjSisaModel $keuangantaspjsisamodel)
    {
        $keuangantaspjsisamodel->fill($request->all());

        if ($keuangantaspjsisamodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjSisaModel successfully updated');
            return redirect()->route('keuangan_ta_spj_sisa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjSisaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisaModel  $keuangantaspjsisamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjSisaModel $keuangantaspjsisamodel)
    {
        if ($keuangantaspjsisamodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjSisaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjSisaModel');
            }

        return redirect()->back();
    }
}
