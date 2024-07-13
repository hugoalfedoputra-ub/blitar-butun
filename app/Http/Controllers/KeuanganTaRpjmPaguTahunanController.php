<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRpjmPaguTahunan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRpjmPaguTahunanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRpjmPaguTahunanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRpjmPaguTahunan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunan  $keuangantarpjmpagutahunan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantarpjmpagutahunan = KeuanganTaRpjmPaguTahunan::find($id);
        if ($keuangantarpjmpagutahunan) {
            return response()->json($keuangantarpjmpagutahunan);
        }
        return response()->json(['message' => 'KeuanganTaRpjmPaguTahunan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_tahunan.create', [
            'model' => new KeuanganTaRpjmPaguTahunan,
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
        $model=new KeuanganTaRpjmPaguTahunan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguTahunan saved successfully');
            return redirect()->route('keuangan_ta_rpjm_pagu_tahunan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRpjmPaguTahunan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunan  $keuangantarpjmpagutahunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRpjmPaguTahunan $keuangantarpjmpagutahunan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rpjm_pagu_tahunan.edit', [
            'model' => $keuangantarpjmpagutahunan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunan  $keuangantarpjmpagutahunan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRpjmPaguTahunan $keuangantarpjmpagutahunan)
    {
        $keuangantarpjmpagutahunan->fill($request->all());

        if ($keuangantarpjmpagutahunan->save()) {
            
            session()->flash('app_message', 'KeuanganTaRpjmPaguTahunan successfully updated');
            return redirect()->route('keuangan_ta_rpjm_pagu_tahunan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRpjmPaguTahunan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRpjmPaguTahunan  $keuangantarpjmpagutahunan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRpjmPaguTahunan $keuangantarpjmpagutahunan)
    {
        if ($keuangantarpjmpagutahunan->delete()) {
                session()->flash('app_message', 'KeuanganTaRpjmPaguTahunan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRpjmPaguTahunan');
            }

        return redirect()->back();
    }
}
