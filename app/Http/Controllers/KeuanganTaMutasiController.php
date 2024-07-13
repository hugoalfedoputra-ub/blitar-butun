<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaMutasi;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaMutasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaMutasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaMutasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasi  $keuangantamutasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantamutasi = KeuanganTaMutasi::find($id);
        if ($keuangantamutasi) {
            return response()->json($keuangantamutasi);
        }
        return response()->json(['message' => 'KeuanganTaMutasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_mutasi.create', [
            'model' => new KeuanganTaMutasi,
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
        $model=new KeuanganTaMutasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaMutasi saved successfully');
            return redirect()->route('keuangan_ta_mutasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaMutasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasi  $keuangantamutasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaMutasi $keuangantamutasi)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_mutasi.edit', [
            'model' => $keuangantamutasi,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasi  $keuangantamutasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaMutasi $keuangantamutasi)
    {
        $keuangantamutasi->fill($request->all());

        if ($keuangantamutasi->save()) {
            
            session()->flash('app_message', 'KeuanganTaMutasi successfully updated');
            return redirect()->route('keuangan_ta_mutasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaMutasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaMutasi  $keuangantamutasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaMutasi $keuangantamutasi)
    {
        if ($keuangantamutasi->delete()) {
                session()->flash('app_message', 'KeuanganTaMutasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaMutasi');
            }

        return redirect()->back();
    }
}
