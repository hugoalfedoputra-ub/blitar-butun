<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmVisi;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmVisiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmVisiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmVisi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisi  $keuangantarpjmvisi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantarpjmvisi = KeuanganTaRpjmVisi::find($id);
        if ($keuangantarpjmvisi) {
            return response()->json($keuangantarpjmvisi);
        }
        return response()->json(['message' => 'KeuanganTaRpjmVisi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_visi.create', [
            'model' => new KeuanganTaRpjmVisi,
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
        $model=new KeuanganTaRpjmVisi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmVisi saved successfully');
            return redirect()->route('keuangan_ta_rpjm_visi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmVisi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisi  $keuangantarpjmvisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmVisi $keuangantarpjmvisi)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_visi.edit', [
            'model' => $keuangantarpjmvisi,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisi  $keuangantarpjmvisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmVisi $keuangantarpjmvisi)
    {
        $keuangantarpjmvisi->fill($request->all());

        if ($keuangantarpjmvisi->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmVisi successfully updated');
            return redirect()->route('keuangan_ta_rpjm_visi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmVisi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmVisi  $keuangantarpjmvisi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmVisi $keuangantarpjmvisi)
    {
        if ($keuangantarpjmvisi->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmVisi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmVisi');
            }

        return redirect()->back();
    }
}
