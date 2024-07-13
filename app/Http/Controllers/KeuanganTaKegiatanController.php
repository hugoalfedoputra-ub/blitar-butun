<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaKegiatan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaKegiatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaKegiatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_kegiatan.index', ['records' => KeuanganTaKegiatan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatan  $keuangantakegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaKegiatan $keuangantakegiatan)
    {
        return view('pages.keuangan_ta_kegiatan.show', [
                'record' =>$keuangantakegiatan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_kegiatan.create', [
            'model' => new KeuanganTaKegiatan,
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
        $model=new KeuanganTaKegiatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaKegiatan saved successfully');
            return redirect()->route('keuangan_ta_kegiatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaKegiatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatan  $keuangantakegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaKegiatan $keuangantakegiatan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_kegiatan.edit', [
            'model' => $keuangantakegiatan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatan  $keuangantakegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaKegiatan $keuangantakegiatan)
    {
        $keuangantakegiatan->fill($request->all());

        if ($keuangantakegiatan->save()) {
            
            session()->flash('app_message', 'KeuanganTaKegiatan successfully updated');
            return redirect()->route('keuangan_ta_kegiatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaKegiatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaKegiatan  $keuangantakegiatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaKegiatan $keuangantakegiatan)
    {
        if ($keuangantakegiatan->delete()) {
                session()->flash('app_message', 'KeuanganTaKegiatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaKegiatan');
            }

        return redirect()->back();
    }
}
