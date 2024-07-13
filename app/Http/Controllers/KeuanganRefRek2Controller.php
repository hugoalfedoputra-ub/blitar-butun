<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek2;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek2Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek2Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_rek2.index', ['records' => KeuanganRefRek2::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2  $keuanganrefrek2
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefRek2 $keuanganrefrek2)
    {
        return view('pages.keuangan_ref_rek2.show', [
                'record' =>$keuanganrefrek2,
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

        return view('pages.keuangan_ref_rek2.create', [
            'model' => new KeuanganRefRek2,
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
        $model=new KeuanganRefRek2;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek2 saved successfully');
            return redirect()->route('keuangan_ref_rek2.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek2');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2  $keuanganrefrek2
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek2 $keuanganrefrek2)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek2.edit', [
            'model' => $keuanganrefrek2,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2  $keuanganrefrek2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek2 $keuanganrefrek2)
    {
        $keuanganrefrek2->fill($request->all());

        if ($keuanganrefrek2->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek2 successfully updated');
            return redirect()->route('keuangan_ref_rek2.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek2');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2  $keuanganrefrek2
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek2 $keuanganrefrek2)
    {
        if ($keuanganrefrek2->delete()) {
                session()->flash('app_message', 'KeuanganRefRek2 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek2');
            }

        return redirect()->back();
    }
}
