<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefKorolariModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefKorolariController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefKorolariController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_korolari.index', ['records' => KeuanganRefKorolariModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolariModel  $keuanganrefkorolarimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefKorolariModel $keuanganrefkorolarimodel)
    {
        return view('pages.keuangan_ref_korolari.show', [
                'record' =>$keuanganrefkorolarimodel,
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

        return view('pages.keuangan_ref_korolari.create', [
            'model' => new KeuanganRefKorolariModel,
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
        $model=new KeuanganRefKorolariModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefKorolariModel saved successfully');
            return redirect()->route('keuangan_ref_korolari.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefKorolariModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolariModel  $keuanganrefkorolarimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefKorolariModel $keuanganrefkorolarimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_korolari.edit', [
            'model' => $keuanganrefkorolarimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolariModel  $keuanganrefkorolarimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefKorolariModel $keuanganrefkorolarimodel)
    {
        $keuanganrefkorolarimodel->fill($request->all());

        if ($keuanganrefkorolarimodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefKorolariModel successfully updated');
            return redirect()->route('keuangan_ref_korolari.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefKorolariModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefKorolariModel  $keuanganrefkorolarimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefKorolariModel $keuanganrefkorolarimodel)
    {
        if ($keuanganrefkorolarimodel->delete()) {
                session()->flash('app_message', 'KeuanganRefKorolariModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefKorolariModel');
            }

        return redirect()->back();
    }
}
