<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmPaguTahunanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmPaguTahunanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmPaguTahunanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_pagu_tahunan.index', ['records' => KeuanganTaRpjmPaguTahunanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunanModel  $keuangantarpjmpagutahunanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmPaguTahunanModel $keuangantarpjmpagutahunanmodel)
    {
        return view('pages.keuangan_ta_rpjm_pagu_tahunan.show', [
                'record' =>$keuangantarpjmpagutahunanmodel,
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

        return view('pages.keuangan_ta_rpjm_pagu_tahunan.create', [
            'model' => new KeuanganTaRpjmPaguTahunanModel,
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
        $model=new KeuanganTaRpjmPaguTahunanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguTahunanModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_pagu_tahunan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmPaguTahunanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunanModel  $keuangantarpjmpagutahunanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmPaguTahunanModel $keuangantarpjmpagutahunanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_tahunan.edit', [
            'model' => $keuangantarpjmpagutahunanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunanModel  $keuangantarpjmpagutahunanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmPaguTahunanModel $keuangantarpjmpagutahunanmodel)
    {
        $keuangantarpjmpagutahunanmodel->fill($request->all());

        if ($keuangantarpjmpagutahunanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguTahunanModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_pagu_tahunan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmPaguTahunanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunanModel  $keuangantarpjmpagutahunanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmPaguTahunanModel $keuangantarpjmpagutahunanmodel)
    {
        if ($keuangantarpjmpagutahunanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmPaguTahunanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmPaguTahunanModel');
            }

        return redirect()->back();
    }
}
