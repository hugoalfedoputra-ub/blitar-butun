<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmSasaran;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmSasaranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmSasaranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmSasaran::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaran  $keuangantarpjmsasaran
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantarpjmsasaran = KeuanganTaRpjmSasaran::find($id);
        if ($keuangantarpjmsasaran) {
            return response()->json($keuangantarpjmsasaran);
        }
        return response()->json(['message' => 'KeuanganTaRpjmSasaran not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_sasaran.create', [
            'model' => new KeuanganTaRpjmSasaran,
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
        $model=new KeuanganTaRpjmSasaran;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmSasaran saved successfully');
            return redirect()->route('keuangan_ta_rpjm_sasaran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmSasaran');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaran  $keuangantarpjmsasaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmSasaran $keuangantarpjmsasaran)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_sasaran.edit', [
            'model' => $keuangantarpjmsasaran,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaran  $keuangantarpjmsasaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmSasaran $keuangantarpjmsasaran)
    {
        $keuangantarpjmsasaran->fill($request->all());

        if ($keuangantarpjmsasaran->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmSasaran successfully updated');
            return redirect()->route('keuangan_ta_rpjm_sasaran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmSasaran');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmSasaran  $keuangantarpjmsasaran
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmSasaran $keuangantarpjmsasaran)
    {
        if ($keuangantarpjmsasaran->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmSasaran successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmSasaran');
            }

        return redirect()->back();
    }
}
