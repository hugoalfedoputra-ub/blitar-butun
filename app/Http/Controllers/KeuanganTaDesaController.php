<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaDesaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_desa.index', ['records' => KeuanganTaDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesaModel  $keuangantadesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaDesaModel $keuangantadesamodel)
    {
        return view('pages.keuangan_ta_desa.show', [
                'record' =>$keuangantadesamodel,
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

        return view('pages.keuangan_ta_desa.create', [
            'model' => new KeuanganTaDesaModel,
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
        $model=new KeuanganTaDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaDesaModel saved successfully');
            return redirect()->route('keuangan_ta_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesaModel  $keuangantadesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaDesaModel $keuangantadesamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_desa.edit', [
            'model' => $keuangantadesamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesaModel  $keuangantadesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaDesaModel $keuangantadesamodel)
    {
        $keuangantadesamodel->fill($request->all());

        if ($keuangantadesamodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaDesaModel successfully updated');
            return redirect()->route('keuangan_ta_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesaModel  $keuangantadesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaDesaModel $keuangantadesamodel)
    {
        if ($keuangantadesamodel->delete()) {
                session()->flash('app_message', 'KeuanganTaDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaDesaModel');
            }

        return redirect()->back();
    }
}
