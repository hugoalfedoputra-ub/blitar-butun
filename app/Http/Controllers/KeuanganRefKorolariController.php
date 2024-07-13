<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKorolari;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKorolariController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKorolariController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefKorolari::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolari  $keuanganrefkorolari
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefkorolari = KeuanganRefKorolari::find($id);
        if ($keuanganrefkorolari) {
            return response()->json($keuanganrefkorolari);
        }
        return response()->json(['message' => 'KeuanganRefKorolari not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_korolari.create', [
            'model' => new KeuanganRefKorolari,
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
        $model=new KeuanganRefKorolari;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKorolari saved successfully');
            return redirect()->route('keuangan_ref_korolari.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKorolari');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolari  $keuanganrefkorolari
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKorolari $keuanganrefkorolari)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_korolari.edit', [
            'model' => $keuanganrefkorolari,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolari  $keuanganrefkorolari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKorolari $keuanganrefkorolari)
    {
        $keuanganrefkorolari->fill($request->all());

        if ($keuanganrefkorolari->save()) {
            
            session()->flash('app_message', 'KeuanganRefKorolari successfully updated');
            return redirect()->route('keuangan_ref_korolari.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKorolari');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolari  $keuanganrefkorolari
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKorolari $keuanganrefkorolari)
    {
        if ($keuanganrefkorolari->delete()) {
                session()->flash('app_message', 'KeuanganRefKorolari successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKorolari');
            }

        return redirect()->back();
    }
}
