<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBelOperasional;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBelOperasionalController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBelOperasionalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefBelOperasional::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasional  $keuanganrefbeloperasional
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBelOperasional $keuanganrefbeloperasional)
    {
        return view('pages.keuangan_ref_bel_operasional.show', [
                'record' =>$keuanganrefbeloperasional,
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

        return view('pages.keuangan_ref_bel_operasional.create', [
            'model' => new KeuanganRefBelOperasional,
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
        $model=new KeuanganRefBelOperasional;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBelOperasional saved successfully');
            return redirect()->route('keuangan_ref_bel_operasional.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBelOperasional');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasional  $keuanganrefbeloperasional
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBelOperasional $keuanganrefbeloperasional)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bel_operasional.edit', [
            'model' => $keuanganrefbeloperasional,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasional  $keuanganrefbeloperasional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBelOperasional $keuanganrefbeloperasional)
    {
        $keuanganrefbeloperasional->fill($request->all());

        if ($keuanganrefbeloperasional->save()) {
            
            session()->flash('app_message', 'KeuanganRefBelOperasional successfully updated');
            return redirect()->route('keuangan_ref_bel_operasional.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBelOperasional');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBelOperasional  $keuanganrefbeloperasional
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBelOperasional $keuanganrefbeloperasional)
    {
        if ($keuanganrefbeloperasional->delete()) {
                session()->flash('app_message', 'KeuanganRefBelOperasional successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBelOperasional');
            }

        return redirect()->back();
    }
}
