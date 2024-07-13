<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spj_rinci.index', ['records' => KeuanganTaSpjRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinciModel  $keuangantaspjrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjRinciModel $keuangantaspjrincimodel)
    {
        return view('pages.keuangan_ta_spj_rinci.show', [
                'record' =>$keuangantaspjrincimodel,
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

        return view('pages.keuangan_ta_spj_rinci.create', [
            'model' => new KeuanganTaSpjRinciModel,
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
        $model=new KeuanganTaSpjRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjRinciModel saved successfully');
            return redirect()->route('keuangan_ta_spj_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinciModel  $keuangantaspjrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjRinciModel $keuangantaspjrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_rinci.edit', [
            'model' => $keuangantaspjrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinciModel  $keuangantaspjrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjRinciModel $keuangantaspjrincimodel)
    {
        $keuangantaspjrincimodel->fill($request->all());

        if ($keuangantaspjrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjRinciModel successfully updated');
            return redirect()->route('keuangan_ta_spj_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinciModel  $keuangantaspjrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjRinciModel $keuangantaspjrincimodel)
    {
        if ($keuangantaspjrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjRinciModel');
            }

        return redirect()->back();
    }
}
