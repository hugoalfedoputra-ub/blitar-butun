<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganMasterModel;


/**
 * Description of KeuanganMasterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganMasterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_master.index', ['records' => KeuanganMasterModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganMasterModel  $keuanganmastermodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganMasterModel $keuanganmastermodel)
    {
        return view('pages.keuangan_master.show', [
                'record' =>$keuanganmastermodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_master.create', [
            'model' => new KeuanganMasterModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganMasterModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganMasterModel saved successfully');
            return redirect()->route('keuangan_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganMasterModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganMasterModel  $keuanganmastermodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganMasterModel $keuanganmastermodel)
    {

        return view('pages.keuangan_master.edit', [
            'model' => $keuanganmastermodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganMasterModel  $keuanganmastermodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganMasterModel $keuanganmastermodel)
    {
        $keuanganmastermodel->fill($request->all());

        if ($keuanganmastermodel->save()) {
            
            session()->flash('app_message', 'KeuanganMasterModel successfully updated');
            return redirect()->route('keuangan_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganMasterModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganMasterModel  $keuanganmastermodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganMasterModel $keuanganmastermodel)
    {
        if ($keuanganmastermodel->delete()) {
                session()->flash('app_message', 'KeuanganMasterModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganMasterModel');
            }

        return redirect()->back();
    }
}
