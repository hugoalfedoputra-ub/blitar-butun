<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LaporanSinkronisasi;


/**
 * Description of LaporanSinkronisasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LaporanSinkronisasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.laporan_sinkronisasi.index', ['records' => LaporanSinkronisasi::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasi  $laporansinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LaporanSinkronisasi $laporansinkronisasi)
    {
        return view('pages.laporan_sinkronisasi.show', [
                'record' =>$laporansinkronisasi,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.laporan_sinkronisasi.create', [
            'model' => new LaporanSinkronisasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LaporanSinkronisasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LaporanSinkronisasi saved successfully');
            return redirect()->route('laporan_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LaporanSinkronisasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasi  $laporansinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LaporanSinkronisasi $laporansinkronisasi)
    {

        return view('pages.laporan_sinkronisasi.edit', [
            'model' => $laporansinkronisasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasi  $laporansinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LaporanSinkronisasi $laporansinkronisasi)
    {
        $laporansinkronisasi->fill($request->all());

        if ($laporansinkronisasi->save()) {
            
            session()->flash('app_message', 'LaporanSinkronisasi successfully updated');
            return redirect()->route('laporan_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LaporanSinkronisasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasi  $laporansinkronisasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LaporanSinkronisasi $laporansinkronisasi)
    {
        if ($laporansinkronisasi->delete()) {
                session()->flash('app_message', 'LaporanSinkronisasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LaporanSinkronisasi');
            }

        return redirect()->back();
    }
}
