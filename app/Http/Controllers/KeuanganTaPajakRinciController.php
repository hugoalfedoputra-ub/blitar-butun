<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPajakRinciModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPajakRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPajakRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pajak_rinci.index', ['records' => KeuanganTaPajakRinciModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinciModel  $keuangantapajakrincimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPajakRinciModel $keuangantapajakrincimodel)
    {
        return view('pages.keuangan_ta_pajak_rinci.show', [
                'record' =>$keuangantapajakrincimodel,
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

        return view('pages.keuangan_ta_pajak_rinci.create', [
            'model' => new KeuanganTaPajakRinciModel,
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
        $model=new KeuanganTaPajakRinciModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakRinciModel saved successfully');
            return redirect()->route('keuangan_ta_pajak_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPajakRinciModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinciModel  $keuangantapajakrincimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPajakRinciModel $keuangantapajakrincimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pajak_rinci.edit', [
            'model' => $keuangantapajakrincimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinciModel  $keuangantapajakrincimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPajakRinciModel $keuangantapajakrincimodel)
    {
        $keuangantapajakrincimodel->fill($request->all());

        if ($keuangantapajakrincimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakRinciModel successfully updated');
            return redirect()->route('keuangan_ta_pajak_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPajakRinciModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinciModel  $keuangantapajakrincimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPajakRinciModel $keuangantapajakrincimodel)
    {
        if ($keuangantapajakrincimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaPajakRinciModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPajakRinciModel');
            }

        return redirect()->back();
    }
}
