<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKecamatanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKecamatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKecamatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_kecamatan.index', ['records' => KeuanganRefKecamatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatanModel  $keuanganrefkecamatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefKecamatanModel $keuanganrefkecamatanmodel)
    {
        return view('pages.keuangan_ref_kecamatan.show', [
                'record' =>$keuanganrefkecamatanmodel,
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

        return view('pages.keuangan_ref_kecamatan.create', [
            'model' => new KeuanganRefKecamatanModel,
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
        $model=new KeuanganRefKecamatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKecamatanModel saved successfully');
            return redirect()->route('keuangan_ref_kecamatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKecamatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatanModel  $keuanganrefkecamatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKecamatanModel $keuanganrefkecamatanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kecamatan.edit', [
            'model' => $keuanganrefkecamatanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatanModel  $keuanganrefkecamatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKecamatanModel $keuanganrefkecamatanmodel)
    {
        $keuanganrefkecamatanmodel->fill($request->all());

        if ($keuanganrefkecamatanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefKecamatanModel successfully updated');
            return redirect()->route('keuangan_ref_kecamatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKecamatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatanModel  $keuanganrefkecamatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKecamatanModel $keuanganrefkecamatanmodel)
    {
        if ($keuanganrefkecamatanmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefKecamatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKecamatanModel');
            }

        return redirect()->back();
    }
}
