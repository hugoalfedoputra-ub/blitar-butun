<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSppRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSppRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSppRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spp_rinci.index', ['records' => KeuanganTaSppRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinciModel  $keuangantaspprincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSppRinciModel $keuangantaspprincimodel)
    {
        return view('pages.keuangan_ta_spp_rinci.show', [
                'record' =>$keuangantaspprincimodel,
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

        return view('pages.keuangan_ta_spp_rinci.create', [
            'model' => new KeuanganTaSppRinciModel,
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
        $model=new KeuanganTaSppRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppRinciModel saved successfully');
            return redirect()->route('keuangan_ta_spp_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSppRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinciModel  $keuangantaspprincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSppRinciModel $keuangantaspprincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spp_rinci.edit', [
            'model' => $keuangantaspprincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinciModel  $keuangantaspprincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSppRinciModel $keuangantaspprincimodel)
    {
        $keuangantaspprincimodel->fill($request->all());

        if ($keuangantaspprincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppRinciModel successfully updated');
            return redirect()->route('keuangan_ta_spp_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSppRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinciModel  $keuangantaspprincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSppRinciModel $keuangantaspprincimodel)
    {
        if ($keuangantaspprincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSppRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSppRinciModel');
            }

        return redirect()->back();
    }
}
