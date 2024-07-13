<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaMutasiModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaMutasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaMutasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_mutasi.index', ['records' => KeuanganTaMutasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasiModel  $keuangantamutasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaMutasiModel $keuangantamutasimodel)
    {
        return view('pages.keuangan_ta_mutasi.show', [
                'record' =>$keuangantamutasimodel,
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

        return view('pages.keuangan_ta_mutasi.create', [
            'model' => new KeuanganTaMutasiModel,
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
        $model=new KeuanganTaMutasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaMutasiModel saved successfully');
            return redirect()->route('keuangan_ta_mutasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaMutasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasiModel  $keuangantamutasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaMutasiModel $keuangantamutasimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_mutasi.edit', [
            'model' => $keuangantamutasimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasiModel  $keuangantamutasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaMutasiModel $keuangantamutasimodel)
    {
        $keuangantamutasimodel->fill($request->all());

        if ($keuangantamutasimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaMutasiModel successfully updated');
            return redirect()->route('keuangan_ta_mutasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaMutasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasiModel  $keuangantamutasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaMutasiModel $keuangantamutasimodel)
    {
        if ($keuangantamutasimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaMutasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaMutasiModel');
            }

        return redirect()->back();
    }
}
