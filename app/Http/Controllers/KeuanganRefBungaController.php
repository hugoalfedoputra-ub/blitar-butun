<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBunga;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBungaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBungaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefBunga::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBunga  $keuanganrefbunga
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefbunga = KeuanganRefBunga::find($id);
        if ($keuanganrefbunga) {
            return response()->json($keuanganrefbunga);
        }
        return response()->json(['message' => 'KeuanganRefBunga not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bunga.create', [
            'model' => new KeuanganRefBunga,
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
        $model=new KeuanganRefBunga;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBunga saved successfully');
            return redirect()->route('keuangan_ref_bunga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBunga');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBunga  $keuanganrefbunga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBunga $keuanganrefbunga)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bunga.edit', [
            'model' => $keuanganrefbunga,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBunga  $keuanganrefbunga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBunga $keuanganrefbunga)
    {
        $keuanganrefbunga->fill($request->all());

        if ($keuanganrefbunga->save()) {
            
            session()->flash('app_message', 'KeuanganRefBunga successfully updated');
            return redirect()->route('keuangan_ref_bunga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBunga');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBunga  $keuanganrefbunga
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBunga $keuanganrefbunga)
    {
        if ($keuanganrefbunga->delete()) {
                session()->flash('app_message', 'KeuanganRefBunga successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBunga');
            }

        return redirect()->back();
    }
}
