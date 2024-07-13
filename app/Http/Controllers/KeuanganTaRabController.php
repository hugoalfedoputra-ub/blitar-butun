<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRab;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRabController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRabController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rab.index', ['records' => KeuanganTaRab::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRab  $keuangantarab
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRab $keuangantarab)
    {
        return view('pages.keuangan_ta_rab.show', [
                'record' =>$keuangantarab,
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

        return view('pages.keuangan_ta_rab.create', [
            'model' => new KeuanganTaRab,
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
        $model=new KeuanganTaRab;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRab saved successfully');
            return redirect()->route('keuangan_ta_rab.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRab');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRab  $keuangantarab
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRab $keuangantarab)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab.edit', [
            'model' => $keuangantarab,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRab  $keuangantarab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRab $keuangantarab)
    {
        $keuangantarab->fill($request->all());

        if ($keuangantarab->save()) {
            
            session()->flash('app_message', 'KeuanganTaRab successfully updated');
            return redirect()->route('keuangan_ta_rab.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRab');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRab  $keuangantarab
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRab $keuangantarab)
    {
        if ($keuangantarab->delete()) {
                session()->flash('app_message', 'KeuanganTaRab successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRab');
            }

        return redirect()->back();
    }
}
