<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefNeracaClose;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefNeracaCloseController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefNeracaCloseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefNeracaClose::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaClose  $keuanganrefneracaclose
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefneracaclose = KeuanganRefNeracaClose::find($id);
        if ($keuanganrefneracaclose) {
            return response()->json($keuanganrefneracaclose);
        }
        return response()->json(['message' => 'KeuanganRefNeracaClose not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_neraca_close.create', [
            'model' => new KeuanganRefNeracaClose,
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
        $model=new KeuanganRefNeracaClose;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefNeracaClose saved successfully');
            return redirect()->route('keuangan_ref_neraca_close.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefNeracaClose');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaClose  $keuanganrefneracaclose
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefNeracaClose $keuanganrefneracaclose)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_neraca_close.edit', [
            'model' => $keuanganrefneracaclose,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaClose  $keuanganrefneracaclose
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefNeracaClose $keuanganrefneracaclose)
    {
        $keuanganrefneracaclose->fill($request->all());

        if ($keuanganrefneracaclose->save()) {
            
            session()->flash('app_message', 'KeuanganRefNeracaClose successfully updated');
            return redirect()->route('keuangan_ref_neraca_close.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefNeracaClose');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefNeracaClose  $keuanganrefneracaclose
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefNeracaClose $keuanganrefneracaclose)
    {
        if ($keuanganrefneracaclose->delete()) {
                session()->flash('app_message', 'KeuanganRefNeracaClose successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefNeracaClose');
            }

        return redirect()->back();
    }
}
