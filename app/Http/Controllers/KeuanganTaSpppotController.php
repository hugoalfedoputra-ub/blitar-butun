<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpppot;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpppotController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpppotController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpppot::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppot  $keuangantaspppot
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaspppot = KeuanganTaSpppot::find($id);
        if ($keuangantaspppot) {
            return response()->json($keuangantaspppot);
        }
        return response()->json(['message' => 'KeuanganTaSpppot not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spppot.create', [
            'model' => new KeuanganTaSpppot,
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
        $model=new KeuanganTaSpppot;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpppot saved successfully');
            return redirect()->route('keuangan_ta_spppot.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpppot');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppot  $keuangantaspppot
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpppot $keuangantaspppot)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spppot.edit', [
            'model' => $keuangantaspppot,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppot  $keuangantaspppot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpppot $keuangantaspppot)
    {
        $keuangantaspppot->fill($request->all());

        if ($keuangantaspppot->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpppot successfully updated');
            return redirect()->route('keuangan_ta_spppot.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpppot');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpppot  $keuangantaspppot
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpppot $keuangantaspppot)
    {
        if ($keuangantaspppot->delete()) {
                session()->flash('app_message', 'KeuanganTaSpppot successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpppot');
            }

        return redirect()->back();
    }
}
