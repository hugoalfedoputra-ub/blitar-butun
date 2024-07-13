<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefSbuModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefSbuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefSbuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_sbu.index', ['records' => KeuanganRefSbuModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbuModel  $keuanganrefsbumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefSbuModel $keuanganrefsbumodel)
    {
        return view('pages.keuangan_ref_sbu.show', [
                'record' =>$keuanganrefsbumodel,
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

        return view('pages.keuangan_ref_sbu.create', [
            'model' => new KeuanganRefSbuModel,
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
        $model=new KeuanganRefSbuModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefSbuModel saved successfully');
            return redirect()->route('keuangan_ref_sbu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefSbuModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbuModel  $keuanganrefsbumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefSbuModel $keuanganrefsbumodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_sbu.edit', [
            'model' => $keuanganrefsbumodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbuModel  $keuanganrefsbumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefSbuModel $keuanganrefsbumodel)
    {
        $keuanganrefsbumodel->fill($request->all());

        if ($keuanganrefsbumodel->save()) {
            
            session()->flash('app_message', 'KeuanganRefSbuModel successfully updated');
            return redirect()->route('keuangan_ref_sbu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefSbuModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSbuModel  $keuanganrefsbumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefSbuModel $keuanganrefsbumodel)
    {
        if ($keuanganrefsbumodel->delete()) {
                session()->flash('app_message', 'KeuanganRefSbuModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefSbuModel');
            }

        return redirect()->back();
    }
}
