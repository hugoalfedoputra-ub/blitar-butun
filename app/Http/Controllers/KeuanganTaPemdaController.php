<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPemdaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPemdaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPemdaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pemda.index', ['records' => KeuanganTaPemdaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemdaModel  $keuangantapemdamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPemdaModel $keuangantapemdamodel)
    {
        return view('pages.keuangan_ta_pemda.show', [
                'record' =>$keuangantapemdamodel,
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

        return view('pages.keuangan_ta_pemda.create', [
            'model' => new KeuanganTaPemdaModel,
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
        $model=new KeuanganTaPemdaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPemdaModel saved successfully');
            return redirect()->route('keuangan_ta_pemda.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPemdaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemdaModel  $keuangantapemdamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPemdaModel $keuangantapemdamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pemda.edit', [
            'model' => $keuangantapemdamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemdaModel  $keuangantapemdamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPemdaModel $keuangantapemdamodel)
    {
        $keuangantapemdamodel->fill($request->all());

        if ($keuangantapemdamodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaPemdaModel successfully updated');
            return redirect()->route('keuangan_ta_pemda.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPemdaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPemdaModel  $keuangantapemdamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPemdaModel $keuangantapemdamodel)
    {
        if ($keuangantapemdamodel->delete()) {
                session()->flash('app_message', 'KeuanganTaPemdaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPemdaModel');
            }

        return redirect()->back();
    }
}
