<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTbp;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTbpController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTbpController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaTbp::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbp  $keuangantatbp
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTbp $keuangantatbp)
    {
        return view('pages.keuangan_ta_tbp.show', [
                'record' =>$keuangantatbp,
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

        return view('pages.keuangan_ta_tbp.create', [
            'model' => new KeuanganTaTbp,
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
        $model=new KeuanganTaTbp;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbp saved successfully');
            return redirect()->route('keuangan_ta_tbp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTbp');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbp  $keuangantatbp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTbp $keuangantatbp)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_tbp.edit', [
            'model' => $keuangantatbp,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbp  $keuangantatbp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTbp $keuangantatbp)
    {
        $keuangantatbp->fill($request->all());

        if ($keuangantatbp->save()) {
            
            session()->flash('app_message', 'KeuanganTaTbp successfully updated');
            return redirect()->route('keuangan_ta_tbp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTbp');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTbp  $keuangantatbp
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTbp $keuangantatbp)
    {
        if ($keuangantatbp->delete()) {
                session()->flash('app_message', 'KeuanganTaTbp successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTbp');
            }

        return redirect()->back();
    }
}
