<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjpotModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjpotController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjpotController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spjpot.index', ['records' => KeuanganTaSpjpotModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpotModel  $keuangantaspjpotmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjpotModel $keuangantaspjpotmodel)
    {
        return view('pages.keuangan_ta_spjpot.show', [
                'record' =>$keuangantaspjpotmodel,
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

        return view('pages.keuangan_ta_spjpot.create', [
            'model' => new KeuanganTaSpjpotModel,
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
        $model=new KeuanganTaSpjpotModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjpotModel saved successfully');
            return redirect()->route('keuangan_ta_spjpot.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjpotModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpotModel  $keuangantaspjpotmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjpotModel $keuangantaspjpotmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spjpot.edit', [
            'model' => $keuangantaspjpotmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpotModel  $keuangantaspjpotmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjpotModel $keuangantaspjpotmodel)
    {
        $keuangantaspjpotmodel->fill($request->all());

        if ($keuangantaspjpotmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjpotModel successfully updated');
            return redirect()->route('keuangan_ta_spjpot.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjpotModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpotModel  $keuangantaspjpotmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjpotModel $keuangantaspjpotmodel)
    {
        if ($keuangantaspjpotmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjpotModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjpotModel');
            }

        return redirect()->back();
    }
}
