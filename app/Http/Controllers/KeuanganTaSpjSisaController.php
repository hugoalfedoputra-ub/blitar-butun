<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjSisa;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjSisaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjSisaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpjSisa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisa  $keuangantaspjsisa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaspjsisa = KeuanganTaSpjSisa::find($id);
        if ($keuangantaspjsisa) {
            return response()->json($keuangantaspjsisa);
        }
        return response()->json(['message' => 'KeuanganTaSpjSisa not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_sisa.create', [
            'model' => new KeuanganTaSpjSisa,
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
        $model=new KeuanganTaSpjSisa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjSisa saved successfully');
            return redirect()->route('keuangan_ta_spj_sisa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjSisa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisa  $keuangantaspjsisa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjSisa $keuangantaspjsisa)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_sisa.edit', [
            'model' => $keuangantaspjsisa,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisa  $keuangantaspjsisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjSisa $keuangantaspjsisa)
    {
        $keuangantaspjsisa->fill($request->all());

        if ($keuangantaspjsisa->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjSisa successfully updated');
            return redirect()->route('keuangan_ta_spj_sisa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjSisa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjSisa  $keuangantaspjsisa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjSisa $keuangantaspjsisa)
    {
        if ($keuangantaspjsisa->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjSisa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjSisa');
            }

        return redirect()->back();
    }
}
