<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSaldoAwalModel;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSaldoAwalController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSaldoAwalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_saldo_awal.index', ['records' => KeuanganTaSaldoAwalModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwalModel  $keuangantasaldoawalmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSaldoAwalModel $keuangantasaldoawalmodel)
    {
        return view('pages.keuangan_ta_saldo_awal.show', [
                'record' =>$keuangantasaldoawalmodel,
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

        return view('pages.keuangan_ta_saldo_awal.create', [
            'model' => new KeuanganTaSaldoAwalModel,
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
        $model=new KeuanganTaSaldoAwalModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSaldoAwalModel saved successfully');
            return redirect()->route('keuangan_ta_saldo_awal.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSaldoAwalModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwalModel  $keuangantasaldoawalmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSaldoAwalModel $keuangantasaldoawalmodel)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_saldo_awal.edit', [
            'model' => $keuangantasaldoawalmodel,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwalModel  $keuangantasaldoawalmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSaldoAwalModel $keuangantasaldoawalmodel)
    {
        $keuangantasaldoawalmodel->fill($request->all());

        if ($keuangantasaldoawalmodel->save()) {
            
            session()->flash('app_message', 'KeuanganTaSaldoAwalModel successfully updated');
            return redirect()->route('keuangan_ta_saldo_awal.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSaldoAwalModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwalModel  $keuangantasaldoawalmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSaldoAwalModel $keuangantasaldoawalmodel)
    {
        if ($keuangantasaldoawalmodel->delete()) {
                session()->flash('app_message', 'KeuanganTaSaldoAwalModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSaldoAwalModel');
            }

        return redirect()->back();
    }
}
