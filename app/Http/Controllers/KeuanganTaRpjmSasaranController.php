<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmSasaranModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmSasaranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmSasaranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rpjm_sasaran.index', ['records' => KeuanganTaRpjmSasaranModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaranModel  $keuangantarpjmsasaranmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmSasaranModel $keuangantarpjmsasaranmodel)
    {
        return view('pages.keuangan_ta_rpjm_sasaran.show', [
                'record' =>$keuangantarpjmsasaranmodel,
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

        return view('pages.keuangan_ta_rpjm_sasaran.create', [
            'model' => new KeuanganTaRpjmSasaranModel,
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
        $model=new KeuanganTaRpjmSasaranModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmSasaranModel saved successfully');
            return redirect()->route('keuangan_ta_rpjm_sasaran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmSasaranModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaranModel  $keuangantarpjmsasaranmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmSasaranModel $keuangantarpjmsasaranmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_sasaran.edit', [
            'model' => $keuangantarpjmsasaranmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaranModel  $keuangantarpjmsasaranmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmSasaranModel $keuangantarpjmsasaranmodel)
    {
        $keuangantarpjmsasaranmodel->fill($request->all());

        if ($keuangantarpjmsasaranmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmSasaranModel successfully updated');
            return redirect()->route('keuangan_ta_rpjm_sasaran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmSasaranModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaranModel  $keuangantarpjmsasaranmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmSasaranModel $keuangantarpjmsasaranmodel)
    {
        if ($keuangantarpjmsasaranmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmSasaranModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmSasaranModel');
            }

        return redirect()->back();
    }
}
