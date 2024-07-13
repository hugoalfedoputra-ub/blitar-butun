<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSpjRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaSpjRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaSpjRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSpjRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinci  $keuangantaspjrinci
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaspjrinci = KeuanganTaSpjRinci::find($id);
        if ($keuangantaspjrinci) {
            return response()->json($keuangantaspjrinci);
        }
        return response()->json(['message' => 'KeuanganTaSpjRinci not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_rinci.create', [
            'model' => new KeuanganTaSpjRinci,
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
        $model=new KeuanganTaSpjRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjRinci saved successfully');
            return redirect()->route('keuangan_ta_spj_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSpjRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinci  $keuangantaspjrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSpjRinci $keuangantaspjrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_spj_rinci.edit', [
            'model' => $keuangantaspjrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinci  $keuangantaspjrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSpjRinci $keuangantaspjrinci)
    {
        $keuangantaspjrinci->fill($request->all());

        if ($keuangantaspjrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaSpjRinci successfully updated');
            return redirect()->route('keuangan_ta_spj_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSpjRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSpjRinci  $keuangantaspjrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSpjRinci $keuangantaspjrinci)
    {
        if ($keuangantaspjrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaSpjRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSpjRinci');
            }

        return redirect()->back();
    }
}
