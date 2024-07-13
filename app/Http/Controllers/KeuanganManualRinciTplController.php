<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRinciTplModel;


/**
 * Description of KeuanganManualRinciTplController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRinciTplController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_manual_rinci_tpl.index', ['records' => KeuanganManualRinciTplModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTplModel  $keuanganmanualrincitplmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRinciTplModel $keuanganmanualrincitplmodel)
    {
        return view('pages.keuangan_manual_rinci_tpl.show', [
                'record' =>$keuanganmanualrincitplmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_rinci_tpl.create', [
            'model' => new KeuanganManualRinciTplModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRinciTplModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciTplModel saved successfully');
            return redirect()->route('keuangan_manual_rinci_tpl.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRinciTplModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTplModel  $keuanganmanualrincitplmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRinciTplModel $keuanganmanualrincitplmodel)
    {

        return view('pages.keuangan_manual_rinci_tpl.edit', [
            'model' => $keuanganmanualrincitplmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTplModel  $keuanganmanualrincitplmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRinciTplModel $keuanganmanualrincitplmodel)
    {
        $keuanganmanualrincitplmodel->fill($request->all());

        if ($keuanganmanualrincitplmodel->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciTplModel successfully updated');
            return redirect()->route('keuangan_manual_rinci_tpl.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRinciTplModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTplModel  $keuanganmanualrincitplmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRinciTplModel $keuanganmanualrincitplmodel)
    {
        if ($keuanganmanualrincitplmodel->delete()) {
                session()->flash('app_message', 'KeuanganManualRinciTplModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRinciTplModel');
            }

        return redirect()->back();
    }
}
