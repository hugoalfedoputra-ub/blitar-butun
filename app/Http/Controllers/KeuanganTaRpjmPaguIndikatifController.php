<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmPaguIndikatifModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmPaguIndikatifController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmPaguIndikatifController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_pagu_indikatif.index', ['records' => KeuanganTaRpjmPaguIndikatifModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatifModel  $keuangantarpjmpaguindikatifmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmPaguIndikatifModel $keuangantarpjmpaguindikatifmodel)
    {
        return view('pages.keuangan_ta_rpjm_pagu_indikatif.show', [
                'record' =>$keuangantarpjmpaguindikatifmodel,
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

        return view('pages.keuangan_ta_rpjm_pagu_indikatif.create', [
            'model' => new KeuanganTaRpjmPaguIndikatifModel,
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
        $model=new KeuanganTaRpjmPaguIndikatifModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatifModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_pagu_indikatif.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmPaguIndikatifModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatifModel  $keuangantarpjmpaguindikatifmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmPaguIndikatifModel $keuangantarpjmpaguindikatifmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_indikatif.edit', [
            'model' => $keuangantarpjmpaguindikatifmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatifModel  $keuangantarpjmpaguindikatifmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmPaguIndikatifModel $keuangantarpjmpaguindikatifmodel)
    {
        $keuangantarpjmpaguindikatifmodel->fill($request->all());

        if ($keuangantarpjmpaguindikatifmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatifModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_pagu_indikatif.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmPaguIndikatifModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatifModel  $keuangantarpjmpaguindikatifmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmPaguIndikatifModel $keuangantarpjmpaguindikatifmodel)
    {
        if ($keuangantarpjmpaguindikatifmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatifModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmPaguIndikatifModel');
            }

        return redirect()->back();
    }
}
