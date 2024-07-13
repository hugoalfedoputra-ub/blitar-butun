<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSaldoAwal;
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
        return view('pages.keuangan_ta_saldo_awal.index', ['records' => KeuanganTaSaldoAwal::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwal  $keuangantasaldoawal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaSaldoAwal $keuangantasaldoawal)
    {
        return view('pages.keuangan_ta_saldo_awal.show', [
                'record' =>$keuangantasaldoawal,
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
            'model' => new KeuanganTaSaldoAwal,
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
        $model=new KeuanganTaSaldoAwal;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSaldoAwal saved successfully');
            return redirect()->route('keuangan_ta_saldo_awal.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSaldoAwal');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwal  $keuangantasaldoawal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSaldoAwal $keuangantasaldoawal)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_saldo_awal.edit', [
            'model' => $keuangantasaldoawal,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwal  $keuangantasaldoawal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSaldoAwal $keuangantasaldoawal)
    {
        $keuangantasaldoawal->fill($request->all());

        if ($keuangantasaldoawal->save()) {
            
            session()->flash('app_message', 'KeuanganTaSaldoAwal successfully updated');
            return redirect()->route('keuangan_ta_saldo_awal.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSaldoAwal');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSaldoAwal  $keuangantasaldoawal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSaldoAwal $keuangantasaldoawal)
    {
        if ($keuangantasaldoawal->delete()) {
                session()->flash('app_message', 'KeuanganTaSaldoAwal successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSaldoAwal');
            }

        return redirect()->back();
    }
}
