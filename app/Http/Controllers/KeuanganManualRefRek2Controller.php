<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganManualRefRek2;


/**
 * Description of KeuanganManualRefRek2Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganManualRefRek2Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganManualRefRek2::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2  $keuanganmanualrefrek2
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganmanualrefrek2 = KeuanganManualRefRek2::find($id);
        if ($keuanganmanualrefrek2) {
            return response()->json($keuanganmanualrefrek2);
        }
        return response()->json(['message' => 'KeuanganManualRefRek2 not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_manual_ref_rek2.create', [
            'model' => new KeuanganManualRefRek2,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganManualRefRek2;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek2 saved successfully');
            return redirect()->route('keuangan_manual_ref_rek2.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganManualRefRek2');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2  $keuanganmanualrefrek2
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganManualRefRek2 $keuanganmanualrefrek2)
    {

        return view('pages.keuangan_manual_ref_rek2.edit', [
            'model' => $keuanganmanualrefrek2,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2  $keuanganmanualrefrek2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganManualRefRek2 $keuanganmanualrefrek2)
    {
        $keuanganmanualrefrek2->fill($request->all());

        if ($keuanganmanualrefrek2->save()) {
            
            session()->flash('app_message', 'KeuanganManualRefRek2 successfully updated');
            return redirect()->route('keuangan_manual_ref_rek2.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganManualRefRek2');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganManualRefRek2  $keuanganmanualrefrek2
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganManualRefRek2 $keuanganmanualrefrek2)
    {
        if ($keuanganmanualrefrek2->delete()) {
                session()->flash('app_message', 'KeuanganManualRefRek2 successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganManualRefRek2');
            }

        return redirect()->back();
    }
}
