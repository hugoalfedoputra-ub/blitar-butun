<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTbpRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTbpRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTbpRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaTbpRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinci  $keuangantatbprinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTbpRinci $keuangantatbprinci)
    {
        return view('pages.keuangan_ta_tbp_rinci.show', [
                'record' =>$keuangantatbprinci,
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

        return view('pages.keuangan_ta_tbp_rinci.create', [
            'model' => new KeuanganTaTbpRinci,
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
        $model=new KeuanganTaTbpRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpRinci saved successfully');
            return redirect()->route('keuangan_ta_tbp_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTbpRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinci  $keuangantatbprinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTbpRinci $keuangantatbprinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_tbp_rinci.edit', [
            'model' => $keuangantatbprinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinci  $keuangantatbprinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTbpRinci $keuangantatbprinci)
    {
        $keuangantatbprinci->fill($request->all());

        if ($keuangantatbprinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbpRinci successfully updated');
            return redirect()->route('keuangan_ta_tbp_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTbpRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbpRinci  $keuangantatbprinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTbpRinci $keuangantatbprinci)
    {
        if ($keuangantatbprinci->delete()) {
                session()->flash('app_message', 'KeuanganTaTbpRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTbpRinci');
            }

        return redirect()->back();
    }
}
