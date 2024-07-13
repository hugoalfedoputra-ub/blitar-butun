<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaStsRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaStsRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaStsRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_sts_rinci.index', ['records' => KeuanganTaStsRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinciModel  $keuangantastsrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaStsRinciModel $keuangantastsrincimodel)
    {
        return view('pages.keuangan_ta_sts_rinci.show', [
                'record' =>$keuangantastsrincimodel,
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

        return view('pages.keuangan_ta_sts_rinci.create', [
            'model' => new KeuanganTaStsRinciModel,
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
        $model=new KeuanganTaStsRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsRinciModel saved successfully');
            return redirect()->route('keuangan_ta_sts_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaStsRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinciModel  $keuangantastsrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaStsRinciModel $keuangantastsrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sts_rinci.edit', [
            'model' => $keuangantastsrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinciModel  $keuangantastsrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaStsRinciModel $keuangantastsrincimodel)
    {
        $keuangantastsrincimodel->fill($request->all());

        if ($keuangantastsrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsRinciModel successfully updated');
            return redirect()->route('keuangan_ta_sts_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaStsRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinciModel  $keuangantastsrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaStsRinciModel $keuangantastsrincimodel)
    {
        if ($keuangantastsrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaStsRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaStsRinciModel');
            }

        return redirect()->back();
    }
}
