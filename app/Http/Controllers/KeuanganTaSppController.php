<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSppModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSppController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSppController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spp.index', ['records' => KeuanganTaSppModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppModel  $keuangantasppmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSppModel $keuangantasppmodel)
    {
        return view('pages.keuangan_ta_spp.show', [
                'record' =>$keuangantasppmodel,
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

        return view('pages.keuangan_ta_spp.create', [
            'model' => new KeuanganTaSppModel,
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
        $model=new KeuanganTaSppModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppModel saved successfully');
            return redirect()->route('keuangan_ta_spp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSppModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppModel  $keuangantasppmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSppModel $keuangantasppmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spp.edit', [
            'model' => $keuangantasppmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppModel  $keuangantasppmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSppModel $keuangantasppmodel)
    {
        $keuangantasppmodel->fill($request->all());

        if ($keuangantasppmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppModel successfully updated');
            return redirect()->route('keuangan_ta_spp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSppModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppModel  $keuangantasppmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSppModel $keuangantasppmodel)
    {
        if ($keuangantasppmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSppModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSppModel');
            }

        return redirect()->back();
    }
}
