<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaKegiatanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_kegiatan.index', ['records' => KeuanganTaKegiatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatanModel  $keuangantakegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaKegiatanModel $keuangantakegiatanmodel)
    {
        return view('pages.keuangan_ta_kegiatan.show', [
                'record' =>$keuangantakegiatanmodel,
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

        return view('pages.keuangan_ta_kegiatan.create', [
            'model' => new KeuanganTaKegiatanModel,
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
        $model=new KeuanganTaKegiatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaKegiatanModel saved successfully');
            return redirect()->route('keuangan_ta_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaKegiatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatanModel  $keuangantakegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaKegiatanModel $keuangantakegiatanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_kegiatan.edit', [
            'model' => $keuangantakegiatanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatanModel  $keuangantakegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaKegiatanModel $keuangantakegiatanmodel)
    {
        $keuangantakegiatanmodel->fill($request->all());

        if ($keuangantakegiatanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaKegiatanModel successfully updated');
            return redirect()->route('keuangan_ta_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaKegiatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatanModel  $keuangantakegiatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaKegiatanModel $keuangantakegiatanmodel)
    {
        if ($keuangantakegiatanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaKegiatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaKegiatanModel');
            }

        return redirect()->back();
    }
}
