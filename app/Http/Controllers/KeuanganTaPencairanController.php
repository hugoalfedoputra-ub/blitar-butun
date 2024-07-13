<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPencairanModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPencairanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPencairanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pencairan.index', ['records' => KeuanganTaPencairanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairanModel  $keuangantapencairanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPencairanModel $keuangantapencairanmodel)
    {
        return view('pages.keuangan_ta_pencairan.show', [
                'record' =>$keuangantapencairanmodel,
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

        return view('pages.keuangan_ta_pencairan.create', [
            'model' => new KeuanganTaPencairanModel,
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
        $model=new KeuanganTaPencairanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPencairanModel saved successfully');
            return redirect()->route('keuangan_ta_pencairan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPencairanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairanModel  $keuangantapencairanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPencairanModel $keuangantapencairanmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pencairan.edit', [
            'model' => $keuangantapencairanmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairanModel  $keuangantapencairanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPencairanModel $keuangantapencairanmodel)
    {
        $keuangantapencairanmodel->fill($request->all());

        if ($keuangantapencairanmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaPencairanModel successfully updated');
            return redirect()->route('keuangan_ta_pencairan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPencairanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairanModel  $keuangantapencairanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPencairanModel $keuangantapencairanmodel)
    {
        if ($keuangantapencairanmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaPencairanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPencairanModel');
            }

        return redirect()->back();
    }
}
