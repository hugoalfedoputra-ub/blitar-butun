<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefPerangkatModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefPerangkatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefPerangkatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_perangkat.index', ['records' => KeuanganRefPerangkatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkatModel  $keuanganrefperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefPerangkatModel $keuanganrefperangkatmodel)
    {
        return view('pages.keuangan_ref_perangkat.show', [
                'record' =>$keuanganrefperangkatmodel,
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

        return view('pages.keuangan_ref_perangkat.create', [
            'model' => new KeuanganRefPerangkatModel,
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
        $model=new KeuanganRefPerangkatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefPerangkatModel saved successfully');
            return redirect()->route('keuangan_ref_perangkat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefPerangkatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkatModel  $keuanganrefperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefPerangkatModel $keuanganrefperangkatmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_perangkat.edit', [
            'model' => $keuanganrefperangkatmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkatModel  $keuanganrefperangkatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefPerangkatModel $keuanganrefperangkatmodel)
    {
        $keuanganrefperangkatmodel->fill($request->all());

        if ($keuanganrefperangkatmodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefPerangkatModel successfully updated');
            return redirect()->route('keuangan_ref_perangkat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefPerangkatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefPerangkatModel  $keuanganrefperangkatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefPerangkatModel $keuanganrefperangkatmodel)
    {
        if ($keuanganrefperangkatmodel->delete()) {
                session()->flash('app_message', 'KeuanganRefPerangkatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefPerangkatModel');
            }

        return redirect()->back();
    }
}
