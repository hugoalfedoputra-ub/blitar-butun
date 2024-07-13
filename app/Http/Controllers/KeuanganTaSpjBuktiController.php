<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjBuktiModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjBuktiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjBuktiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_spj_bukti.index', ['records' => KeuanganTaSpjBuktiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBuktiModel  $keuangantaspjbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSpjBuktiModel $keuangantaspjbuktimodel)
    {
        return view('pages.keuangan_ta_spj_bukti.show', [
                'record' =>$keuangantaspjbuktimodel,
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

        return view('pages.keuangan_ta_spj_bukti.create', [
            'model' => new KeuanganTaSpjBuktiModel,
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
        $model=new KeuanganTaSpjBuktiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjBuktiModel saved successfully');
            return redirect()->route('keuangan_ta_spj_bukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjBuktiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBuktiModel  $keuangantaspjbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjBuktiModel $keuangantaspjbuktimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_bukti.edit', [
            'model' => $keuangantaspjbuktimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBuktiModel  $keuangantaspjbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjBuktiModel $keuangantaspjbuktimodel)
    {
        $keuangantaspjbuktimodel->fill($request->all());

        if ($keuangantaspjbuktimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjBuktiModel successfully updated');
            return redirect()->route('keuangan_ta_spj_bukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjBuktiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjBuktiModel  $keuangantaspjbuktimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjBuktiModel $keuangantaspjbuktimodel)
    {
        if ($keuangantaspjbuktimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjBuktiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjBuktiModel');
            }

        return redirect()->back();
    }
}
