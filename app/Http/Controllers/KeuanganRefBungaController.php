<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBungaModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBungaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBungaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_bunga.index', ['records' => KeuanganRefBungaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBungaModel  $keuanganrefbungamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefBungaModel $keuanganrefbungamodel)
    {
        return view('pages.keuangan_ref_bunga.show', [
                'record' =>$keuanganrefbungamodel,
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

        return view('pages.keuangan_ref_bunga.create', [
            'model' => new KeuanganRefBungaModel,
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
        $model=new KeuanganRefBungaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBungaModel saved successfully');
            return redirect()->route('keuangan_ref_bunga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBungaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBungaModel  $keuanganrefbungamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBungaModel $keuanganrefbungamodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bunga.edit', [
            'model' => $keuanganrefbungamodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBungaModel  $keuanganrefbungamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBungaModel $keuanganrefbungamodel)
    {
        $keuanganrefbungamodel->fill($request->all());

        if ($keuanganrefbungamodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefBungaModel successfully updated');
            return redirect()->route('keuangan_ref_bunga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBungaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBungaModel  $keuanganrefbungamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBungaModel $keuanganrefbungamodel)
    {
        if ($keuanganrefbungamodel->delete()) {
                session()->flash('app_message', 'KeuanganRefBungaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBungaModel');
            }

        return redirect()->back();
    }
}
