<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSppbuktiModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSppbuktiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSppbuktiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_sppbukti.index', ['records' => KeuanganTaSppbuktiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbuktiModel  $keuangantasppbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSppbuktiModel $keuangantasppbuktimodel)
    {
        return view('pages.keuangan_ta_sppbukti.show', [
                'record' =>$keuangantasppbuktimodel,
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

        return view('pages.keuangan_ta_sppbukti.create', [
            'model' => new KeuanganTaSppbuktiModel,
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
        $model=new KeuanganTaSppbuktiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppbuktiModel saved successfully');
            return redirect()->route('keuangan_ta_sppbukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSppbuktiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbuktiModel  $keuangantasppbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSppbuktiModel $keuangantasppbuktimodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sppbukti.edit', [
            'model' => $keuangantasppbuktimodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbuktiModel  $keuangantasppbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSppbuktiModel $keuangantasppbuktimodel)
    {
        $keuangantasppbuktimodel->fill($request->all());

        if ($keuangantasppbuktimodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppbuktiModel successfully updated');
            return redirect()->route('keuangan_ta_sppbukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSppbuktiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbuktiModel  $keuangantasppbuktimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSppbuktiModel $keuangantasppbuktimodel)
    {
        if ($keuangantasppbuktimodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSppbuktiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSppbuktiModel');
            }

        return redirect()->back();
    }
}
