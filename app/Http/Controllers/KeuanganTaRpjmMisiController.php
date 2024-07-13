<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmMisi;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmMisiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmMisiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmMisi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisi  $keuangantarpjmmisi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRpjmMisi $keuangantarpjmmisi)
    {
        return view('pages.keuangan_ta_rpjm_misi.show', [
                'record' =>$keuangantarpjmmisi,
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

        return view('pages.keuangan_ta_rpjm_misi.create', [
            'model' => new KeuanganTaRpjmMisi,
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
        $model=new KeuanganTaRpjmMisi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmMisi saved successfully');
            return redirect()->route('keuangan_ta_rpjm_misi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmMisi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisi  $keuangantarpjmmisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmMisi $keuangantarpjmmisi)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_misi.edit', [
            'model' => $keuangantarpjmmisi,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisi  $keuangantarpjmmisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmMisi $keuangantarpjmmisi)
    {
        $keuangantarpjmmisi->fill($request->all());

        if ($keuangantarpjmmisi->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmMisi successfully updated');
            return redirect()->route('keuangan_ta_rpjm_misi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmMisi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmMisi  $keuangantarpjmmisi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmMisi $keuangantarpjmmisi)
    {
        if ($keuangantarpjmmisi->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmMisi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmMisi');
            }

        return redirect()->back();
    }
}
