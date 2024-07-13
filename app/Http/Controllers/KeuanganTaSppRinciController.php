<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSppRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSppRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSppRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSppRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinci  $keuangantaspprinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSppRinci $keuangantaspprinci)
    {
        return view('pages.keuangan_ta_spp_rinci.show', [
                'record' =>$keuangantaspprinci,
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

        return view('pages.keuangan_ta_spp_rinci.create', [
            'model' => new KeuanganTaSppRinci,
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
        $model=new KeuanganTaSppRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppRinci saved successfully');
            return redirect()->route('keuangan_ta_spp_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSppRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinci  $keuangantaspprinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSppRinci $keuangantaspprinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spp_rinci.edit', [
            'model' => $keuangantaspprinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinci  $keuangantaspprinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSppRinci $keuangantaspprinci)
    {
        $keuangantaspprinci->fill($request->all());

        if ($keuangantaspprinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppRinci successfully updated');
            return redirect()->route('keuangan_ta_spp_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSppRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppRinci  $keuangantaspprinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSppRinci $keuangantaspprinci)
    {
        if ($keuangantaspprinci->delete()) {
                session()->flash('app_message', 'KeuanganTaSppRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSppRinci');
            }

        return redirect()->back();
    }
}
