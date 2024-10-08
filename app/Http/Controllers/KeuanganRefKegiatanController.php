<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKegiatan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefKegiatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatan  $keuanganrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefkegiatan = KeuanganRefKegiatan::find($id);
        if ($keuanganrefkegiatan) {
            return response()->json($keuanganrefkegiatan);
        }
        return response()->json(['message' => 'KeuanganRefKegiatan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kegiatan.create', [
            'model' => new KeuanganRefKegiatan,
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
        $model=new KeuanganRefKegiatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKegiatan saved successfully');
            return redirect()->route('keuangan_ref_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKegiatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatan  $keuanganrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKegiatan $keuanganrefkegiatan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_kegiatan.edit', [
            'model' => $keuanganrefkegiatan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatan  $keuanganrefkegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKegiatan $keuanganrefkegiatan)
    {
        $keuanganrefkegiatan->fill($request->all());

        if ($keuanganrefkegiatan->save()) {
            
            session()->flash('app_message', 'KeuanganRefKegiatan successfully updated');
            return redirect()->route('keuangan_ref_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKegiatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKegiatan  $keuanganrefkegiatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKegiatan $keuanganrefkegiatan)
    {
        if ($keuanganrefkegiatan->delete()) {
                session()->flash('app_message', 'KeuanganRefKegiatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKegiatan');
            }

        return redirect()->back();
    }
}
