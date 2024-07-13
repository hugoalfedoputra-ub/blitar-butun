<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPemda;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPemdaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPemdaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pemda.index', ['records' => KeuanganTaPemda::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemda  $keuangantapemda
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPemda $keuangantapemda)
    {
        return view('pages.keuangan_ta_pemda.show', [
                'record' =>$keuangantapemda,
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

        return view('pages.keuangan_ta_pemda.create', [
            'model' => new KeuanganTaPemda,
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
        $model=new KeuanganTaPemda;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPemda saved successfully');
            return redirect()->route('keuangan_ta_pemda.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPemda');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemda  $keuangantapemda
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPemda $keuangantapemda)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pemda.edit', [
            'model' => $keuangantapemda,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemda  $keuangantapemda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPemda $keuangantapemda)
    {
        $keuangantapemda->fill($request->all());

        if ($keuangantapemda->save()) {
            
            session()->flash('app_message', 'KeuanganTaPemda successfully updated');
            return redirect()->route('keuangan_ta_pemda.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPemda');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemda  $keuangantapemda
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPemda $keuangantapemda)
    {
        if ($keuangantapemda->delete()) {
                session()->flash('app_message', 'KeuanganTaPemda successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPemda');
            }

        return redirect()->back();
    }
}
