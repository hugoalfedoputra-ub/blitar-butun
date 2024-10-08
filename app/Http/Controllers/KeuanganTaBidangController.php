<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaBidang;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaBidangController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaBidangController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaBidang::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaBidang  $keuangantabidang
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantabidang = KeuanganTaBidang::find($id);
        if ($keuangantabidang) {
            return response()->json($keuangantabidang);
        }
        return response()->json(['message' => 'KeuanganTaBidang not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_bidang.create', [
            'model' => new KeuanganTaBidang,
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
        $model=new KeuanganTaBidang;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaBidang saved successfully');
            return redirect()->route('keuangan_ta_bidang.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaBidang');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaBidang  $keuangantabidang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaBidang $keuangantabidang)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_bidang.edit', [
            'model' => $keuangantabidang,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaBidang  $keuangantabidang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaBidang $keuangantabidang)
    {
        $keuangantabidang->fill($request->all());

        if ($keuangantabidang->save()) {
            
            session()->flash('app_message', 'KeuanganTaBidang successfully updated');
            return redirect()->route('keuangan_ta_bidang.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaBidang');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaBidang  $keuangantabidang
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaBidang $keuangantabidang)
    {
        if ($keuangantabidang->delete()) {
                session()->flash('app_message', 'KeuanganTaBidang successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaBidang');
            }

        return redirect()->back();
    }
}
