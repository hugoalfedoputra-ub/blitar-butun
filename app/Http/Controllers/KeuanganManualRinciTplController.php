<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRinciTpl;


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
        return KeuanganManualRinciTpl::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTpl  $keuanganmanualrincitpl
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRinciTpl $keuanganmanualrincitpl)
    {
        return view('pages.keuangan_manual_rinci_tpl.show', [
                'record' =>$keuanganmanualrincitpl,
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
            'model' => new KeuanganManualRinciTpl,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRinciTpl;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciTpl saved successfully');
            return redirect()->route('keuangan_manual_rinci_tpl.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRinciTpl');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTpl  $keuanganmanualrincitpl
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRinciTpl $keuanganmanualrincitpl)
    {

        return view('pages.keuangan_manual_rinci_tpl.edit', [
            'model' => $keuanganmanualrincitpl,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTpl  $keuanganmanualrincitpl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRinciTpl $keuanganmanualrincitpl)
    {
        $keuanganmanualrincitpl->fill($request->all());

        if ($keuanganmanualrincitpl->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinciTpl successfully updated');
            return redirect()->route('keuangan_manual_rinci_tpl.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRinciTpl');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinciTpl  $keuanganmanualrincitpl
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRinciTpl $keuanganmanualrincitpl)
    {
        if ($keuanganmanualrincitpl->delete()) {
                session()->flash('app_message', 'KeuanganManualRinciTpl successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRinciTpl');
            }

        return redirect()->back();
    }
}
