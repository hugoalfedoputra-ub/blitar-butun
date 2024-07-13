<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTriwulanRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTriwulanRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTriwulanRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_triwulan_rinci.index', ['records' => KeuanganTaTriwulanRinci::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinci  $keuangantatriwulanrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTriwulanRinci $keuangantatriwulanrinci)
    {
        return view('pages.keuangan_ta_triwulan_rinci.show', [
                'record' =>$keuangantatriwulanrinci,
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

        return view('pages.keuangan_ta_triwulan_rinci.create', [
            'model' => new KeuanganTaTriwulanRinci,
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
        $model=new KeuanganTaTriwulanRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanRinci saved successfully');
            return redirect()->route('keuangan_ta_triwulan_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTriwulanRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinci  $keuangantatriwulanrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTriwulanRinci $keuangantatriwulanrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_triwulan_rinci.edit', [
            'model' => $keuangantatriwulanrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinci  $keuangantatriwulanrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTriwulanRinci $keuangantatriwulanrinci)
    {
        $keuangantatriwulanrinci->fill($request->all());

        if ($keuangantatriwulanrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanRinci successfully updated');
            return redirect()->route('keuangan_ta_triwulan_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTriwulanRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanRinci  $keuangantatriwulanrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTriwulanRinci $keuangantatriwulanrinci)
    {
        if ($keuangantatriwulanrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaTriwulanRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTriwulanRinci');
            }

        return redirect()->back();
    }
}
