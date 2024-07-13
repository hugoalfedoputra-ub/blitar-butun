<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPerangkat;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPerangkatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPerangkatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaPerangkat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkat  $keuangantaperangkat
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaperangkat = KeuanganTaPerangkat::find($id);
        if ($keuangantaperangkat) {
            return response()->json($keuangantaperangkat);
        }
        return response()->json(['message' => 'KeuanganTaPerangkat not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_perangkat.create', [
            'model' => new KeuanganTaPerangkat,
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
        $model=new KeuanganTaPerangkat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPerangkat saved successfully');
            return redirect()->route('keuangan_ta_perangkat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPerangkat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkat  $keuangantaperangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPerangkat $keuangantaperangkat)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_perangkat.edit', [
            'model' => $keuangantaperangkat,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkat  $keuangantaperangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPerangkat $keuangantaperangkat)
    {
        $keuangantaperangkat->fill($request->all());

        if ($keuangantaperangkat->save()) {
            
            session()->flash('app_message', 'KeuanganTaPerangkat successfully updated');
            return redirect()->route('keuangan_ta_perangkat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPerangkat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkat  $keuangantaperangkat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPerangkat $keuangantaperangkat)
    {
        if ($keuangantaperangkat->delete()) {
                session()->flash('app_message', 'KeuanganTaPerangkat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPerangkat');
            }

        return redirect()->back();
    }
}
