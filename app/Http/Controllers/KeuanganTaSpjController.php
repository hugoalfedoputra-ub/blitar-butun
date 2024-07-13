<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spj.index', ['records' => KeuanganTaSpjModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjModel  $keuangantaspjmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjModel $keuangantaspjmodel)
    {
        return view('pages.keuangan_ta_spj.show', [
                'record' =>$keuangantaspjmodel,
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

        return view('pages.keuangan_ta_spj.create', [
            'model' => new KeuanganTaSpjModel,
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
        $model=new KeuanganTaSpjModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjModel saved successfully');
            return redirect()->route('keuangan_ta_spj.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjModel  $keuangantaspjmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjModel $keuangantaspjmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj.edit', [
            'model' => $keuangantaspjmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjModel  $keuangantaspjmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjModel $keuangantaspjmodel)
    {
        $keuangantaspjmodel->fill($request->all());

        if ($keuangantaspjmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjModel successfully updated');
            return redirect()->route('keuangan_ta_spj.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjModel  $keuangantaspjmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjModel $keuangantaspjmodel)
    {
        if ($keuangantaspjmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjModel');
            }

        return redirect()->back();
    }
}
