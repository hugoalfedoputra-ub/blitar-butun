<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LaporanSinkronisasiModel;


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
        return view('pages.laporan_sinkronisasi.index', ['records' => LaporanSinkronisasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasiModel  $laporansinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LaporanSinkronisasiModel $laporansinkronisasimodel)
    {
        return view('pages.laporan_sinkronisasi.show', [
                'record' =>$laporansinkronisasimodel,
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
            'model' => new LaporanSinkronisasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LaporanSinkronisasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LaporanSinkronisasiModel saved successfully');
            return redirect()->route('laporan_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LaporanSinkronisasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasiModel  $laporansinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LaporanSinkronisasiModel $laporansinkronisasimodel)
    {

        return view('pages.laporan_sinkronisasi.edit', [
            'model' => $laporansinkronisasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasiModel  $laporansinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LaporanSinkronisasiModel $laporansinkronisasimodel)
    {
        $laporansinkronisasimodel->fill($request->all());

        if ($laporansinkronisasimodel->save()) {
            
            session()->flash('app_message', 'LaporanSinkronisasiModel successfully updated');
            return redirect()->route('laporan_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LaporanSinkronisasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LaporanSinkronisasiModel  $laporansinkronisasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LaporanSinkronisasiModel $laporansinkronisasimodel)
    {
        if ($laporansinkronisasimodel->delete()) {
                session()->flash('app_message', 'LaporanSinkronisasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LaporanSinkronisasiModel');
            }

        return redirect()->back();
    }
}
