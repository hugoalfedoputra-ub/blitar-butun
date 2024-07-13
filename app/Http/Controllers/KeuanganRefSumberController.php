<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefSumberModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefSumberController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefSumberController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_sumber.index', ['records' => KeuanganRefSumberModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumberModel  $keuanganrefsumbermodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefSumberModel $keuanganrefsumbermodel)
    {
        return view('pages.keuangan_ref_sumber.show', [
                'record' =>$keuanganrefsumbermodel,
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

        return view('pages.keuangan_ref_sumber.create', [
            'model' => new KeuanganRefSumberModel,
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
        $model=new KeuanganRefSumberModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefSumberModel saved successfully');
            return redirect()->route('keuangan_ref_sumber.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefSumberModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumberModel  $keuanganrefsumbermodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefSumberModel $keuanganrefsumbermodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_sumber.edit', [
            'model' => $keuanganrefsumbermodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumberModel  $keuanganrefsumbermodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefSumberModel $keuanganrefsumbermodel)
    {
        $keuanganrefsumbermodel->fill($request->all());

        if ($keuanganrefsumbermodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefSumberModel successfully updated');
            return redirect()->route('keuangan_ref_sumber.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefSumberModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumberModel  $keuanganrefsumbermodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefSumberModel $keuanganrefsumbermodel)
    {
        if ($keuanganrefsumbermodel->delete()) {
                session()->flash('app_message', 'KeuanganRefSumberModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefSumberModel');
            }

        return redirect()->back();
    }
}
