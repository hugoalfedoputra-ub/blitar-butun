<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSppbukti;
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
        return KeuanganTaSppbukti::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbukti  $keuangantasppbukti
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantasppbukti = KeuanganTaSppbukti::find($id);
        if ($keuangantasppbukti) {
            return response()->json($keuangantasppbukti);
        }
        return response()->json(['message' => 'KeuanganTaSppbukti not found'], 404);
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
            'model' => new KeuanganTaSppbukti,
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
        $model=new KeuanganTaSppbukti;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppbukti saved successfully');
            return redirect()->route('keuangan_ta_sppbukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSppbukti');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbukti  $keuangantasppbukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSppbukti $keuangantasppbukti)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sppbukti.edit', [
            'model' => $keuangantasppbukti,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbukti  $keuangantasppbukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSppbukti $keuangantasppbukti)
    {
        $keuangantasppbukti->fill($request->all());

        if ($keuangantasppbukti->save()) {
            
            session()->flash('app_message', 'KeuanganTaSppbukti successfully updated');
            return redirect()->route('keuangan_ta_sppbukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSppbukti');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSppbukti  $keuangantasppbukti
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSppbukti $keuangantasppbukti)
    {
        if ($keuangantasppbukti->delete()) {
                session()->flash('app_message', 'KeuanganTaSppbukti successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSppbukti');
            }

        return redirect()->back();
    }
}
