<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmBidang;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmBidang::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidang  $keuangantarpjmbidang
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmBidang $keuangantarpjmbidang)
    {
        return view('pages.keuangan_ta_rpjm_bidang.show', [
                'record' =>$keuangantarpjmbidang,
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

        return view('pages.keuangan_ta_rpjm_bidang.create', [
            'model' => new KeuanganTaRpjmBidang,
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
        $model=new KeuanganTaRpjmBidang;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmBidang saved successfully');
            return redirect()->route('keuangan_ta_rpjm_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmBidang');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidang  $keuangantarpjmbidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmBidang $keuangantarpjmbidang)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_bidang.edit', [
            'model' => $keuangantarpjmbidang,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidang  $keuangantarpjmbidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmBidang $keuangantarpjmbidang)
    {
        $keuangantarpjmbidang->fill($request->all());

        if ($keuangantarpjmbidang->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmBidang successfully updated');
            return redirect()->route('keuangan_ta_rpjm_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmBidang');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmBidang  $keuangantarpjmbidang
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmBidang $keuangantarpjmbidang)
    {
        if ($keuangantarpjmbidang->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmBidang successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmBidang');
            }

        return redirect()->back();
    }
}
