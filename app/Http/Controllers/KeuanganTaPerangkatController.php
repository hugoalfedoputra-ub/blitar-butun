<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPerangkatModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPerangkatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPerangkatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_perangkat.index', ['records' => KeuanganTaPerangkatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkatModel  $keuangantaperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPerangkatModel $keuangantaperangkatmodel)
    {
        return view('pages.keuangan_ta_perangkat.show', [
                'record' =>$keuangantaperangkatmodel,
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

        return view('pages.keuangan_ta_perangkat.create', [
            'model' => new KeuanganTaPerangkatModel,
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
        $model=new KeuanganTaPerangkatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPerangkatModel saved successfully');
            return redirect()->route('keuangan_ta_perangkat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPerangkatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkatModel  $keuangantaperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPerangkatModel $keuangantaperangkatmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_perangkat.edit', [
            'model' => $keuangantaperangkatmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkatModel  $keuangantaperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPerangkatModel $keuangantaperangkatmodel)
    {
        $keuangantaperangkatmodel->fill($request->all());

        if ($keuangantaperangkatmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaPerangkatModel successfully updated');
            return redirect()->route('keuangan_ta_perangkat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPerangkatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPerangkatModel  $keuangantaperangkatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPerangkatModel $keuangantaperangkatmodel)
    {
        if ($keuangantaperangkatmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaPerangkatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPerangkatModel');
            }

        return redirect()->back();
    }
}
