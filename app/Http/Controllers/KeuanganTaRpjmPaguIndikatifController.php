<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmPaguIndikatif;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmPaguIndikatifController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmPaguIndikatifController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmPaguIndikatif::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatif  $keuangantarpjmpaguindikatif
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantarpjmpaguindikatif = KeuanganTaRpjmPaguIndikatif::find($id);
        if ($keuangantarpjmpaguindikatif) {
            return response()->json($keuangantarpjmpaguindikatif);
        }
        return response()->json(['message' => 'KeuanganTaRpjmPaguIndikatif not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_indikatif.create', [
            'model' => new KeuanganTaRpjmPaguIndikatif,
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
        $model=new KeuanganTaRpjmPaguIndikatif;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatif saved successfully');
            return redirect()->route('keuangan_ta_rpjm_pagu_indikatif.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmPaguIndikatif');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatif  $keuangantarpjmpaguindikatif
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmPaguIndikatif $keuangantarpjmpaguindikatif)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_indikatif.edit', [
            'model' => $keuangantarpjmpaguindikatif,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatif  $keuangantarpjmpaguindikatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmPaguIndikatif $keuangantarpjmpaguindikatif)
    {
        $keuangantarpjmpaguindikatif->fill($request->all());

        if ($keuangantarpjmpaguindikatif->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatif successfully updated');
            return redirect()->route('keuangan_ta_rpjm_pagu_indikatif.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmPaguIndikatif');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguIndikatif  $keuangantarpjmpaguindikatif
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmPaguIndikatif $keuangantarpjmpaguindikatif)
    {
        if ($keuangantarpjmpaguindikatif->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmPaguIndikatif successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmPaguIndikatif');
            }

        return redirect()->back();
    }
}
