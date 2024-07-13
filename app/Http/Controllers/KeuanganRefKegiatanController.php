<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKegiatanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_kegiatan.index', ['records' => KeuanganRefKegiatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatanModel  $keuanganrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefKegiatanModel $keuanganrefkegiatanmodel)
    {
        return view('pages.keuangan_ref_kegiatan.show', [
                'record' =>$keuanganrefkegiatanmodel,
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

        return view('pages.keuangan_ref_kegiatan.create', [
            'model' => new KeuanganRefKegiatanModel,
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
        $model=new KeuanganRefKegiatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKegiatanModel saved successfully');
            return redirect()->route('keuangan_ref_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKegiatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatanModel  $keuanganrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKegiatanModel $keuanganrefkegiatanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kegiatan.edit', [
            'model' => $keuanganrefkegiatanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatanModel  $keuanganrefkegiatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKegiatanModel $keuanganrefkegiatanmodel)
    {
        $keuanganrefkegiatanmodel->fill($request->all());

        if ($keuanganrefkegiatanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefKegiatanModel successfully updated');
            return redirect()->route('keuangan_ref_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKegiatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatanModel  $keuanganrefkegiatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKegiatanModel $keuanganrefkegiatanmodel)
    {
        if ($keuanganrefkegiatanmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefKegiatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKegiatanModel');
            }

        return redirect()->back();
    }
}
