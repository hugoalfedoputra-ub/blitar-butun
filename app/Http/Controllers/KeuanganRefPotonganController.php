<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefPotongan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefPotonganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefPotonganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_potongan.index', ['records' => KeuanganRefPotongan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotongan  $keuanganrefpotongan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefPotongan $keuanganrefpotongan)
    {
        return view('pages.keuangan_ref_potongan.show', [
                'record' =>$keuanganrefpotongan,
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

        return view('pages.keuangan_ref_potongan.create', [
            'model' => new KeuanganRefPotongan,
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
        $model=new KeuanganRefPotongan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefPotongan saved successfully');
            return redirect()->route('keuangan_ref_potongan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefPotongan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotongan  $keuanganrefpotongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefPotongan $keuanganrefpotongan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_potongan.edit', [
            'model' => $keuanganrefpotongan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotongan  $keuanganrefpotongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefPotongan $keuanganrefpotongan)
    {
        $keuanganrefpotongan->fill($request->all());

        if ($keuanganrefpotongan->save()) {
            
            session()->flash('app_message', 'KeuanganRefPotongan successfully updated');
            return redirect()->route('keuangan_ref_potongan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefPotongan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotongan  $keuanganrefpotongan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefPotongan $keuanganrefpotongan)
    {
        if ($keuanganrefpotongan->delete()) {
                session()->flash('app_message', 'KeuanganRefPotongan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefPotongan');
            }

        return redirect()->back();
    }
}
