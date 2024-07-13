<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjBukti;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjBuktiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjBuktiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpjBukti::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBukti  $keuangantaspjbukti
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjBukti $keuangantaspjbukti)
    {
        return view('pages.keuangan_ta_spj_bukti.show', [
                'record' =>$keuangantaspjbukti,
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

        return view('pages.keuangan_ta_spj_bukti.create', [
            'model' => new KeuanganTaSpjBukti,
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
        $model=new KeuanganTaSpjBukti;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjBukti saved successfully');
            return redirect()->route('keuangan_ta_spj_bukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjBukti');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBukti  $keuangantaspjbukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjBukti $keuangantaspjbukti)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_bukti.edit', [
            'model' => $keuangantaspjbukti,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBukti  $keuangantaspjbukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjBukti $keuangantaspjbukti)
    {
        $keuangantaspjbukti->fill($request->all());

        if ($keuangantaspjbukti->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjBukti successfully updated');
            return redirect()->route('keuangan_ta_spj_bukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjBukti');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBukti  $keuangantaspjbukti
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjBukti $keuangantaspjbukti)
    {
        if ($keuangantaspjbukti->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjBukti successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjBukti');
            }

        return redirect()->back();
    }
}
