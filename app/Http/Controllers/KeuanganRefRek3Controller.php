<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek3;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek3Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek3Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefRek3::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3  $keuanganrefrek3
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefrek3 = KeuanganRefRek3::find($id);
        if ($keuanganrefrek3) {
            return response()->json($keuanganrefrek3);
        }
        return response()->json(['message' => 'KeuanganRefRek3 not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek3.create', [
            'model' => new KeuanganRefRek3,
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
        $model=new KeuanganRefRek3;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek3 saved successfully');
            return redirect()->route('keuangan_ref_rek3.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek3');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3  $keuanganrefrek3
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek3 $keuanganrefrek3)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek3.edit', [
            'model' => $keuanganrefrek3,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3  $keuanganrefrek3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek3 $keuanganrefrek3)
    {
        $keuanganrefrek3->fill($request->all());

        if ($keuanganrefrek3->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek3 successfully updated');
            return redirect()->route('keuangan_ref_rek3.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek3');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek3  $keuanganrefrek3
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek3 $keuanganrefrek3)
    {
        if ($keuanganrefrek3->delete()) {
                session()->flash('app_message', 'KeuanganRefRek3 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek3');
            }

        return redirect()->back();
    }
}
