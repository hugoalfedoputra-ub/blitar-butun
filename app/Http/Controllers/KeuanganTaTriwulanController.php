<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTriwulan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTriwulanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTriwulanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_triwulan.index', ['records' => KeuanganTaTriwulan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulan  $keuangantatriwulan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTriwulan $keuangantatriwulan)
    {
        return view('pages.keuangan_ta_triwulan.show', [
                'record' =>$keuangantatriwulan,
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

        return view('pages.keuangan_ta_triwulan.create', [
            'model' => new KeuanganTaTriwulan,
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
        $model=new KeuanganTaTriwulan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulan saved successfully');
            return redirect()->route('keuangan_ta_triwulan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTriwulan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulan  $keuangantatriwulan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTriwulan $keuangantatriwulan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_triwulan.edit', [
            'model' => $keuangantatriwulan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulan  $keuangantatriwulan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTriwulan $keuangantatriwulan)
    {
        $keuangantatriwulan->fill($request->all());

        if ($keuangantatriwulan->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulan successfully updated');
            return redirect()->route('keuangan_ta_triwulan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTriwulan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulan  $keuangantatriwulan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTriwulan $keuangantatriwulan)
    {
        if ($keuangantatriwulan->delete()) {
                session()->flash('app_message', 'KeuanganTaTriwulan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTriwulan');
            }

        return redirect()->back();
    }
}
