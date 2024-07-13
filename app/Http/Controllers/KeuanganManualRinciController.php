<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRinci;


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
        return view('pages.keuangan_manual_rinci.index', ['records' => KeuanganManualRinci::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinci  $keuanganmanualrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganManualRinci $keuanganmanualrinci)
    {
        return view('pages.keuangan_manual_rinci.show', [
                'record' =>$keuanganmanualrinci,
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
            'model' => new KeuanganManualRinci,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinci saved successfully');
            return redirect()->route('keuangan_manual_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinci  $keuanganmanualrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRinci $keuanganmanualrinci)
    {

        return view('pages.keuangan_manual_rinci.edit', [
            'model' => $keuanganmanualrinci,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinci  $keuanganmanualrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRinci $keuanganmanualrinci)
    {
        $keuanganmanualrinci->fill($request->all());

        if ($keuanganmanualrinci->save()) {
            
            session()->flash('app_message', 'KeuanganManualRinci successfully updated');
            return redirect()->route('keuangan_manual_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRinci  $keuanganmanualrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRinci $keuanganmanualrinci)
    {
        if ($keuanganmanualrinci->delete()) {
                session()->flash('app_message', 'KeuanganManualRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRinci');
            }

        return redirect()->back();
    }
}
