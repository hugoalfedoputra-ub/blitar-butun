<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPajakModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPajakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPajakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pajak.index', ['records' => KeuanganTaPajakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakModel  $keuangantapajakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPajakModel $keuangantapajakmodel)
    {
        return view('pages.keuangan_ta_pajak.show', [
                'record' =>$keuangantapajakmodel,
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

        return view('pages.keuangan_ta_pajak.create', [
            'model' => new KeuanganTaPajakModel,
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
        $model=new KeuanganTaPajakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakModel saved successfully');
            return redirect()->route('keuangan_ta_pajak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPajakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakModel  $keuangantapajakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPajakModel $keuangantapajakmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pajak.edit', [
            'model' => $keuangantapajakmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakModel  $keuangantapajakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPajakModel $keuangantapajakmodel)
    {
        $keuangantapajakmodel->fill($request->all());

        if ($keuangantapajakmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakModel successfully updated');
            return redirect()->route('keuangan_ta_pajak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPajakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakModel  $keuangantapajakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPajakModel $keuangantapajakmodel)
    {
        if ($keuangantapajakmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaPajakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPajakModel');
            }

        return redirect()->back();
    }
}
