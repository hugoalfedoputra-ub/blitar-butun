<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaJurnalUmumRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaJurnalUmumRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaJurnalUmumRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaJurnalUmumRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinci  $keuangantajurnalumumrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaJurnalUmumRinci $keuangantajurnalumumrinci)
    {
        return view('pages.keuangan_ta_jurnal_umum_rinci.show', [
                'record' =>$keuangantajurnalumumrinci,
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

        return view('pages.keuangan_ta_jurnal_umum_rinci.create', [
            'model' => new KeuanganTaJurnalUmumRinci,
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
        $model=new KeuanganTaJurnalUmumRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumRinci saved successfully');
            return redirect()->route('keuangan_ta_jurnal_umum_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaJurnalUmumRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinci  $keuangantajurnalumumrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaJurnalUmumRinci $keuangantajurnalumumrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_jurnal_umum_rinci.edit', [
            'model' => $keuangantajurnalumumrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinci  $keuangantajurnalumumrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaJurnalUmumRinci $keuangantajurnalumumrinci)
    {
        $keuangantajurnalumumrinci->fill($request->all());

        if ($keuangantajurnalumumrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaJurnalUmumRinci successfully updated');
            return redirect()->route('keuangan_ta_jurnal_umum_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaJurnalUmumRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaJurnalUmumRinci  $keuangantajurnalumumrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaJurnalUmumRinci $keuangantajurnalumumrinci)
    {
        if ($keuangantajurnalumumrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaJurnalUmumRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaJurnalUmumRinci');
            }

        return redirect()->back();
    }
}
