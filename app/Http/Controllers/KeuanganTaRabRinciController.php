<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRabRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRabRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRabRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rab_rinci.index', ['records' => KeuanganTaRabRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinciModel  $keuangantarabrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRabRinciModel $keuangantarabrincimodel)
    {
        return view('pages.keuangan_ta_rab_rinci.show', [
                'record' =>$keuangantarabrincimodel,
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

        return view('pages.keuangan_ta_rab_rinci.create', [
            'model' => new KeuanganTaRabRinciModel,
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
        $model=new KeuanganTaRabRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabRinciModel saved successfully');
            return redirect()->route('keuangan_ta_rab_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRabRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinciModel  $keuangantarabrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRabRinciModel $keuangantarabrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab_rinci.edit', [
            'model' => $keuangantarabrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinciModel  $keuangantarabrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRabRinciModel $keuangantarabrincimodel)
    {
        $keuangantarabrincimodel->fill($request->all());

        if ($keuangantarabrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabRinciModel successfully updated');
            return redirect()->route('keuangan_ta_rab_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRabRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinciModel  $keuangantarabrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRabRinciModel $keuangantarabrincimodel)
    {
        if ($keuangantarabrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaRabRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRabRinciModel');
            }

        return redirect()->back();
    }
}
