<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjpot;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjpotController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjpotController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpjpot::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpot  $keuangantaspjpot
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaspjpot = KeuanganTaSpjpot::find($id);
        if ($keuangantaspjpot) {
            return response()->json($keuangantaspjpot);
        }
        return response()->json(['message' => 'KeuanganTaSpjpot not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spjpot.create', [
            'model' => new KeuanganTaSpjpot,
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
        $model=new KeuanganTaSpjpot;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjpot saved successfully');
            return redirect()->route('keuangan_ta_spjpot.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjpot');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpot  $keuangantaspjpot
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjpot $keuangantaspjpot)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spjpot.edit', [
            'model' => $keuangantaspjpot,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpot  $keuangantaspjpot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjpot $keuangantaspjpot)
    {
        $keuangantaspjpot->fill($request->all());

        if ($keuangantaspjpot->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjpot successfully updated');
            return redirect()->route('keuangan_ta_spjpot.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjpot');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjpot  $keuangantaspjpot
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjpot $keuangantaspjpot)
    {
        if ($keuangantaspjpot->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjpot successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjpot');
            }

        return redirect()->back();
    }
}
