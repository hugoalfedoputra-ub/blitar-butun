<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek1;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek1Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek1Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefRek1::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek1  $keuanganrefrek1
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefRek1 $keuanganrefrek1)
    {
        return view('pages.keuangan_ref_rek1.show', [
                'record' =>$keuanganrefrek1,
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

        return view('pages.keuangan_ref_rek1.create', [
            'model' => new KeuanganRefRek1,
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
        $model=new KeuanganRefRek1;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek1 saved successfully');
            return redirect()->route('keuangan_ref_rek1.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek1');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek1  $keuanganrefrek1
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek1 $keuanganrefrek1)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek1.edit', [
            'model' => $keuanganrefrek1,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek1  $keuanganrefrek1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek1 $keuanganrefrek1)
    {
        $keuanganrefrek1->fill($request->all());

        if ($keuanganrefrek1->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek1 successfully updated');
            return redirect()->route('keuangan_ref_rek1.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek1');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek1  $keuanganrefrek1
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek1 $keuanganrefrek1)
    {
        if ($keuanganrefrek1->delete()) {
                session()->flash('app_message', 'KeuanganRefRek1 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek1');
            }

        return redirect()->back();
    }
}
