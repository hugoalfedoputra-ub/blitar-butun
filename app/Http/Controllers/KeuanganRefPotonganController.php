<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefPotonganModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefPotonganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefPotonganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_potongan.index', ['records' => KeuanganRefPotonganModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotonganModel  $keuanganrefpotonganmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefPotonganModel $keuanganrefpotonganmodel)
    {
        return view('pages.keuangan_ref_potongan.show', [
                'record' =>$keuanganrefpotonganmodel,
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

        return view('pages.keuangan_ref_potongan.create', [
            'model' => new KeuanganRefPotonganModel,
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
        $model=new KeuanganRefPotonganModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefPotonganModel saved successfully');
            return redirect()->route('keuangan_ref_potongan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefPotonganModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotonganModel  $keuanganrefpotonganmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefPotonganModel $keuanganrefpotonganmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_potongan.edit', [
            'model' => $keuanganrefpotonganmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotonganModel  $keuanganrefpotonganmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefPotonganModel $keuanganrefpotonganmodel)
    {
        $keuanganrefpotonganmodel->fill($request->all());

        if ($keuanganrefpotonganmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefPotonganModel successfully updated');
            return redirect()->route('keuangan_ref_potongan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefPotonganModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPotonganModel  $keuanganrefpotonganmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefPotonganModel $keuanganrefpotonganmodel)
    {
        if ($keuanganrefpotonganmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefPotonganModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefPotonganModel');
            }

        return redirect()->back();
    }
}
