<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefSbu;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefSbuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefSbuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefSbu::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbu  $keuanganrefsbu
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefsbu = KeuanganRefSbu::find($id);
        if ($keuanganrefsbu) {
            return response()->json($keuanganrefsbu);
        }
        return response()->json(['message' => 'KeuanganRefSbu not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_sbu.create', [
            'model' => new KeuanganRefSbu,
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
        $model=new KeuanganRefSbu;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefSbu saved successfully');
            return redirect()->route('keuangan_ref_sbu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefSbu');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbu  $keuanganrefsbu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefSbu $keuanganrefsbu)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_sbu.edit', [
            'model' => $keuanganrefsbu,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbu  $keuanganrefsbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefSbu $keuanganrefsbu)
    {
        $keuanganrefsbu->fill($request->all());

        if ($keuanganrefsbu->save()) {
            
            session()->flash('app_message', 'KeuanganRefSbu successfully updated');
            return redirect()->route('keuangan_ref_sbu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefSbu');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbu  $keuanganrefsbu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefSbu $keuanganrefsbu)
    {
        if ($keuanganrefsbu->delete()) {
                session()->flash('app_message', 'KeuanganRefSbu successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefSbu');
            }

        return redirect()->back();
    }
}
