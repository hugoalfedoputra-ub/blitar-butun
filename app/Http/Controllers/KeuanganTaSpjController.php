<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpj;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpj::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpj  $keuangantaspj
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpj $keuangantaspj)
    {
        return view('pages.keuangan_ta_spj.show', [
                'record' =>$keuangantaspj,
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

        return view('pages.keuangan_ta_spj.create', [
            'model' => new KeuanganTaSpj,
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
        $model=new KeuanganTaSpj;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpj saved successfully');
            return redirect()->route('keuangan_ta_spj.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpj');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpj  $keuangantaspj
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpj $keuangantaspj)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj.edit', [
            'model' => $keuangantaspj,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpj  $keuangantaspj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpj $keuangantaspj)
    {
        $keuangantaspj->fill($request->all());

        if ($keuangantaspj->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpj successfully updated');
            return redirect()->route('keuangan_ta_spj.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpj');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpj  $keuangantaspj
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpj $keuangantaspj)
    {
        if ($keuangantaspj->delete()) {
                session()->flash('app_message', 'KeuanganTaSpj successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpj');
            }

        return redirect()->back();
    }
}
