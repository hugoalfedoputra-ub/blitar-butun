<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek4;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek4Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek4Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefRek4::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek4  $keuanganrefrek4
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefRek4 $keuanganrefrek4)
    {
        return view('pages.keuangan_ref_rek4.show', [
                'record' =>$keuanganrefrek4,
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

        return view('pages.keuangan_ref_rek4.create', [
            'model' => new KeuanganRefRek4,
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
        $model=new KeuanganRefRek4;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek4 saved successfully');
            return redirect()->route('keuangan_ref_rek4.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek4');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek4  $keuanganrefrek4
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek4 $keuanganrefrek4)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek4.edit', [
            'model' => $keuanganrefrek4,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek4  $keuanganrefrek4
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek4 $keuanganrefrek4)
    {
        $keuanganrefrek4->fill($request->all());

        if ($keuanganrefrek4->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek4 successfully updated');
            return redirect()->route('keuangan_ref_rek4.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek4');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek4  $keuanganrefrek4
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek4 $keuanganrefrek4)
    {
        if ($keuanganrefrek4->delete()) {
                session()->flash('app_message', 'KeuanganRefRek4 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek4');
            }

        return redirect()->back();
    }
}
