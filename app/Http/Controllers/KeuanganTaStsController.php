<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaStsModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaStsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaStsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_sts.index', ['records' => KeuanganTaStsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsModel  $keuangantastsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaStsModel $keuangantastsmodel)
    {
        return view('pages.keuangan_ta_sts.show', [
                'record' =>$keuangantastsmodel,
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

        return view('pages.keuangan_ta_sts.create', [
            'model' => new KeuanganTaStsModel,
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
        $model=new KeuanganTaStsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsModel saved successfully');
            return redirect()->route('keuangan_ta_sts.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaStsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsModel  $keuangantastsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaStsModel $keuangantastsmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sts.edit', [
            'model' => $keuangantastsmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsModel  $keuangantastsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaStsModel $keuangantastsmodel)
    {
        $keuangantastsmodel->fill($request->all());

        if ($keuangantastsmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsModel successfully updated');
            return redirect()->route('keuangan_ta_sts.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaStsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsModel  $keuangantastsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaStsModel $keuangantastsmodel)
    {
        if ($keuangantastsmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaStsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaStsModel');
            }

        return redirect()->back();
    }
}
