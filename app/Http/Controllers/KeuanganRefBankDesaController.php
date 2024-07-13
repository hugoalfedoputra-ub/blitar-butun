<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefBankDesa;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefBankDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefBankDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganRefBankDesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesa  $keuanganrefbankdesa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganrefbankdesa = KeuanganRefBankDesa::find($id);
        if ($keuanganrefbankdesa) {
            return response()->json($keuanganrefbankdesa);
        }
        return response()->json(['message' => 'KeuanganRefBankDesa not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bank_desa.create', [
            'model' => new KeuanganRefBankDesa,
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
        $model=new KeuanganRefBankDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefBankDesa saved successfully');
            return redirect()->route('keuangan_ref_bank_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefBankDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesa  $keuanganrefbankdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefBankDesa $keuanganrefbankdesa)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_bank_desa.edit', [
            'model' => $keuanganrefbankdesa,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesa  $keuanganrefbankdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefBankDesa $keuanganrefbankdesa)
    {
        $keuanganrefbankdesa->fill($request->all());

        if ($keuanganrefbankdesa->save()) {
            
            session()->flash('app_message', 'KeuanganRefBankDesa successfully updated');
            return redirect()->route('keuangan_ref_bank_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefBankDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefBankDesa  $keuanganrefbankdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefBankDesa $keuanganrefbankdesa)
    {
        if ($keuanganrefbankdesa->delete()) {
                session()->flash('app_message', 'KeuanganRefBankDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefBankDesa');
            }

        return redirect()->back();
    }
}
