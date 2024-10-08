<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpp;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSppController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSppController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpp::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpp  $keuangantaspp
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaspp = KeuanganTaSpp::find($id);
        if ($keuangantaspp) {
            return response()->json($keuangantaspp);
        }
        return response()->json(['message' => 'KeuanganTaSpp not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spp.create', [
            'model' => new KeuanganTaSpp,
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
        $model=new KeuanganTaSpp;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpp saved successfully');
            return redirect()->route('keuangan_ta_spp.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpp');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpp  $keuangantaspp
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpp $keuangantaspp)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spp.edit', [
            'model' => $keuangantaspp,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpp  $keuangantaspp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpp $keuangantaspp)
    {
        $keuangantaspp->fill($request->all());

        if ($keuangantaspp->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpp successfully updated');
            return redirect()->route('keuangan_ta_spp.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpp');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpp  $keuangantaspp
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpp $keuangantaspp)
    {
        if ($keuangantaspp->delete()) {
                session()->flash('app_message', 'KeuanganTaSpp successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpp');
            }

        return redirect()->back();
    }
}
