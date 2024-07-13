<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRabSubModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRabSubController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRabSubController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rab_sub.index', ['records' => KeuanganTaRabSubModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSubModel  $keuangantarabsubmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRabSubModel $keuangantarabsubmodel)
    {
        return view('pages.keuangan_ta_rab_sub.show', [
                'record' =>$keuangantarabsubmodel,
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

        return view('pages.keuangan_ta_rab_sub.create', [
            'model' => new KeuanganTaRabSubModel,
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
        $model=new KeuanganTaRabSubModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabSubModel saved successfully');
            return redirect()->route('keuangan_ta_rab_sub.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRabSubModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSubModel  $keuangantarabsubmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRabSubModel $keuangantarabsubmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab_sub.edit', [
            'model' => $keuangantarabsubmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSubModel  $keuangantarabsubmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRabSubModel $keuangantarabsubmodel)
    {
        $keuangantarabsubmodel->fill($request->all());

        if ($keuangantarabsubmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabSubModel successfully updated');
            return redirect()->route('keuangan_ta_rab_sub.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRabSubModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSubModel  $keuangantarabsubmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRabSubModel $keuangantarabsubmodel)
    {
        if ($keuangantarabsubmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRabSubModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRabSubModel');
            }

        return redirect()->back();
    }
}
