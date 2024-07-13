<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKecamatan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKecamatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKecamatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefKecamatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatan  $keuanganrefkecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefkecamatan = KeuanganRefKecamatan::find($id);
        if ($keuanganrefkecamatan) {
            return response()->json($keuanganrefkecamatan);
        }
        return response()->json(['message' => 'KeuanganRefKecamatan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kecamatan.create', [
            'model' => new KeuanganRefKecamatan,
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
        $model=new KeuanganRefKecamatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKecamatan saved successfully');
            return redirect()->route('keuangan_ref_kecamatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKecamatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatan  $keuanganrefkecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKecamatan $keuanganrefkecamatan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kecamatan.edit', [
            'model' => $keuanganrefkecamatan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatan  $keuanganrefkecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKecamatan $keuanganrefkecamatan)
    {
        $keuanganrefkecamatan->fill($request->all());

        if ($keuanganrefkecamatan->save()) {
            
            session()->flash('app_message', 'KeuanganRefKecamatan successfully updated');
            return redirect()->route('keuangan_ref_kecamatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKecamatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKecamatan  $keuanganrefkecamatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKecamatan $keuanganrefkecamatan)
    {
        if ($keuanganrefkecamatan->delete()) {
                session()->flash('app_message', 'KeuanganRefKecamatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKecamatan');
            }

        return redirect()->back();
    }
}
