<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRabModel;
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
        return view('pages.keuangan_ta_rab.index', ['records' => KeuanganTaRabModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabModel  $keuangantarabmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRabModel $keuangantarabmodel)
    {
        return view('pages.keuangan_ta_rab.show', [
                'record' =>$keuangantarabmodel,
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
            'model' => new KeuanganTaRabModel,
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
        $model=new KeuanganTaRabModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabModel saved successfully');
            return redirect()->route('keuangan_ta_rab.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRabModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabModel  $keuangantarabmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRabModel $keuangantarabmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab.edit', [
            'model' => $keuangantarabmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabModel  $keuangantarabmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRabModel $keuangantarabmodel)
    {
        $keuangantarabmodel->fill($request->all());

        if ($keuangantarabmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabModel successfully updated');
            return redirect()->route('keuangan_ta_rab.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRabModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabModel  $keuangantarabmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRabModel $keuangantarabmodel)
    {
        if ($keuangantarabmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRabModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRabModel');
            }

        return redirect()->back();
    }
}
