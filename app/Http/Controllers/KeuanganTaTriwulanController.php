<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaTriwulanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaTriwulanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaTriwulanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_triwulan.index', ['records' => KeuanganTaTriwulanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanModel  $keuangantatriwulanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaTriwulanModel $keuangantatriwulanmodel)
    {
        return view('pages.keuangan_ta_triwulan.show', [
                'record' =>$keuangantatriwulanmodel,
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

        return view('pages.keuangan_ta_triwulan.create', [
            'model' => new KeuanganTaTriwulanModel,
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
        $model=new KeuanganTaTriwulanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanModel saved successfully');
            return redirect()->route('keuangan_ta_triwulan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaTriwulanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanModel  $keuangantatriwulanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaTriwulanModel $keuangantatriwulanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_triwulan.edit', [
            'model' => $keuangantatriwulanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanModel  $keuangantatriwulanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaTriwulanModel $keuangantatriwulanmodel)
    {
        $keuangantatriwulanmodel->fill($request->all());

        if ($keuangantatriwulanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaTriwulanModel successfully updated');
            return redirect()->route('keuangan_ta_triwulan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaTriwulanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaTriwulanModel  $keuangantatriwulanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaTriwulanModel $keuangantatriwulanmodel)
    {
        if ($keuangantatriwulanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaTriwulanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaTriwulanModel');
            }

        return redirect()->back();
    }
}
