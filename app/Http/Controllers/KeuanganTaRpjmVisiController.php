<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmVisiModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmVisiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmVisiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_visi.index', ['records' => KeuanganTaRpjmVisiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisiModel  $keuangantarpjmvisimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmVisiModel $keuangantarpjmvisimodel)
    {
        return view('pages.keuangan_ta_rpjm_visi.show', [
                'record' =>$keuangantarpjmvisimodel,
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

        return view('pages.keuangan_ta_rpjm_visi.create', [
            'model' => new KeuanganTaRpjmVisiModel,
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
        $model=new KeuanganTaRpjmVisiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmVisiModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_visi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmVisiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisiModel  $keuangantarpjmvisimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmVisiModel $keuangantarpjmvisimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_visi.edit', [
            'model' => $keuangantarpjmvisimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisiModel  $keuangantarpjmvisimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmVisiModel $keuangantarpjmvisimodel)
    {
        $keuangantarpjmvisimodel->fill($request->all());

        if ($keuangantarpjmvisimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmVisiModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_visi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmVisiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisiModel  $keuangantarpjmvisimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmVisiModel $keuangantarpjmvisimodel)
    {
        if ($keuangantarpjmvisimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmVisiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmVisiModel');
            }

        return redirect()->back();
    }
}
