<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBidang;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefBidang::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidang  $keuanganrefbidang
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBidang $keuanganrefbidang)
    {
        return view('pages.keuangan_ref_bidang.show', [
                'record' =>$keuanganrefbidang,
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

        return view('pages.keuangan_ref_bidang.create', [
            'model' => new KeuanganRefBidang,
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
        $model=new KeuanganRefBidang;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBidang saved successfully');
            return redirect()->route('keuangan_ref_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBidang');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidang  $keuanganrefbidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBidang $keuanganrefbidang)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bidang.edit', [
            'model' => $keuanganrefbidang,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidang  $keuanganrefbidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBidang $keuanganrefbidang)
    {
        $keuanganrefbidang->fill($request->all());

        if ($keuanganrefbidang->save()) {
            
            session()->flash('app_message', 'KeuanganRefBidang successfully updated');
            return redirect()->route('keuangan_ref_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBidang');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBidang  $keuanganrefbidang
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBidang $keuanganrefbidang)
    {
        if ($keuanganrefbidang->delete()) {
                session()->flash('app_message', 'KeuanganRefBidang successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBidang');
            }

        return redirect()->back();
    }
}
