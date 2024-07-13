<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmMisiModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmMisiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmMisiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_misi.index', ['records' => KeuanganTaRpjmMisiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisiModel  $keuangantarpjmmisimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmMisiModel $keuangantarpjmmisimodel)
    {
        return view('pages.keuangan_ta_rpjm_misi.show', [
                'record' =>$keuangantarpjmmisimodel,
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

        return view('pages.keuangan_ta_rpjm_misi.create', [
            'model' => new KeuanganTaRpjmMisiModel,
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
        $model=new KeuanganTaRpjmMisiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmMisiModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_misi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmMisiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisiModel  $keuangantarpjmmisimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmMisiModel $keuangantarpjmmisimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_misi.edit', [
            'model' => $keuangantarpjmmisimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisiModel  $keuangantarpjmmisimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmMisiModel $keuangantarpjmmisimodel)
    {
        $keuangantarpjmmisimodel->fill($request->all());

        if ($keuangantarpjmmisimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmMisiModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_misi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmMisiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisiModel  $keuangantarpjmmisimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmMisiModel $keuangantarpjmmisimodel)
    {
        if ($keuangantarpjmmisimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmMisiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmMisiModel');
            }

        return redirect()->back();
    }
}
