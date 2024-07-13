<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRinciModel;


/**
 * Description of KeuanganManualRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_rinci.index', ['records' => KeuanganManualRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciModel  $keuanganmanualrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRinciModel $keuanganmanualrincimodel)
    {
        return view('pages.keuangan_manual_rinci.show', [
                'record' =>$keuanganmanualrincimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_rinci.create', [
            'model' => new KeuanganManualRinciModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciModel saved successfully');
            return redirect()->route('keuangan_manual_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciModel  $keuanganmanualrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRinciModel $keuanganmanualrincimodel)
    {

        return view('pages.keuangan_manual_rinci.edit', [
            'model' => $keuanganmanualrincimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciModel  $keuanganmanualrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRinciModel $keuanganmanualrincimodel)
    {
        $keuanganmanualrincimodel->fill($request->all());

        if ($keuanganmanualrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciModel successfully updated');
            return redirect()->route('keuangan_manual_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciModel  $keuanganmanualrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRinciModel $keuanganmanualrincimodel)
    {
        if ($keuanganmanualrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganManualRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRinciModel');
            }

        return redirect()->back();
    }
}
