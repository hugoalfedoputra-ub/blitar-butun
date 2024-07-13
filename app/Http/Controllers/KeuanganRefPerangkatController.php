<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefPerangkat;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefPerangkatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefPerangkatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefPerangkat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkat  $keuanganrefperangkat
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefperangkat = KeuanganRefPerangkat::find($id);
        if ($keuanganrefperangkat) {
            return response()->json($keuanganrefperangkat);
        }
        return response()->json(['message' => 'KeuanganRefPerangkat not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_perangkat.create', [
            'model' => new KeuanganRefPerangkat,
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
        $model=new KeuanganRefPerangkat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefPerangkat saved successfully');
            return redirect()->route('keuangan_ref_perangkat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefPerangkat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkat  $keuanganrefperangkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefPerangkat $keuanganrefperangkat)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_perangkat.edit', [
            'model' => $keuanganrefperangkat,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkat  $keuanganrefperangkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefPerangkat $keuanganrefperangkat)
    {
        $keuanganrefperangkat->fill($request->all());

        if ($keuanganrefperangkat->save()) {
            
            session()->flash('app_message', 'KeuanganRefPerangkat successfully updated');
            return redirect()->route('keuangan_ref_perangkat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefPerangkat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkat  $keuanganrefperangkat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefPerangkat $keuanganrefperangkat)
    {
        if ($keuanganrefperangkat->delete()) {
                session()->flash('app_message', 'KeuanganRefPerangkat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefPerangkat');
            }

        return redirect()->back();
    }
}
