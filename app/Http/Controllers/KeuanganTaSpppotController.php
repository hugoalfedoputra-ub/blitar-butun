<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpppotModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpppotController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpppotController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spppot.index', ['records' => KeuanganTaSpppotModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppotModel  $keuangantaspppotmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpppotModel $keuangantaspppotmodel)
    {
        return view('pages.keuangan_ta_spppot.show', [
                'record' =>$keuangantaspppotmodel,
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

        return view('pages.keuangan_ta_spppot.create', [
            'model' => new KeuanganTaSpppotModel,
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
        $model=new KeuanganTaSpppotModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpppotModel saved successfully');
            return redirect()->route('keuangan_ta_spppot.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpppotModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppotModel  $keuangantaspppotmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpppotModel $keuangantaspppotmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spppot.edit', [
            'model' => $keuangantaspppotmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppotModel  $keuangantaspppotmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpppotModel $keuangantaspppotmodel)
    {
        $keuangantaspppotmodel->fill($request->all());

        if ($keuangantaspppotmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpppotModel successfully updated');
            return redirect()->route('keuangan_ta_spppot.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpppotModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppotModel  $keuangantaspppotmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpppotModel $keuangantaspppotmodel)
    {
        if ($keuangantaspppotmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpppotModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpppotModel');
            }

        return redirect()->back();
    }
}
