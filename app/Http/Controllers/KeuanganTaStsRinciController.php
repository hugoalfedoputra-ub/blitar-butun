<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaStsRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaStsRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaStsRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaStsRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinci  $keuangantastsrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaStsRinci $keuangantastsrinci)
    {
        return view('pages.keuangan_ta_sts_rinci.show', [
                'record' =>$keuangantastsrinci,
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

        return view('pages.keuangan_ta_sts_rinci.create', [
            'model' => new KeuanganTaStsRinci,
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
        $model=new KeuanganTaStsRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsRinci saved successfully');
            return redirect()->route('keuangan_ta_sts_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaStsRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinci  $keuangantastsrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaStsRinci $keuangantastsrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sts_rinci.edit', [
            'model' => $keuangantastsrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinci  $keuangantastsrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaStsRinci $keuangantastsrinci)
    {
        $keuangantastsrinci->fill($request->all());

        if ($keuangantastsrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaStsRinci successfully updated');
            return redirect()->route('keuangan_ta_sts_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaStsRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaStsRinci  $keuangantastsrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaStsRinci $keuangantastsrinci)
    {
        if ($keuangantastsrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaStsRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaStsRinci');
            }

        return redirect()->back();
    }
}
