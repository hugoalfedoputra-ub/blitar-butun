<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaranRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaAnggaranRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaAnggaranRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaAnggaranRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinci  $keuangantaanggaranrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaAnggaranRinci $keuangantaanggaranrinci)
    {
        return view('pages.keuangan_ta_anggaran_rinci.show', [
                'record' =>$keuangantaanggaranrinci,
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

        return view('pages.keuangan_ta_anggaran_rinci.create', [
            'model' => new KeuanganTaAnggaranRinci,
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
        $model=new KeuanganTaAnggaranRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranRinci saved successfully');
            return redirect()->route('keuangan_ta_anggaran_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaranRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinci  $keuangantaanggaranrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaranRinci $keuangantaanggaranrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran_rinci.edit', [
            'model' => $keuangantaanggaranrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinci  $keuangantaanggaranrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaranRinci $keuangantaanggaranrinci)
    {
        $keuangantaanggaranrinci->fill($request->all());

        if ($keuangantaanggaranrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranRinci successfully updated');
            return redirect()->route('keuangan_ta_anggaran_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaranRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranRinci  $keuangantaanggaranrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaranRinci $keuangantaanggaranrinci)
    {
        if ($keuangantaanggaranrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaranRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaranRinci');
            }

        return redirect()->back();
    }
}
