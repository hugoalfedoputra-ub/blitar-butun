<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaSts;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaStsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaStsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaSts::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSts  $keuangantasts
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantasts = KeuanganTaSts::find($id);
        if ($keuangantasts) {
            return response()->json($keuangantasts);
        }
        return response()->json(['message' => 'KeuanganTaSts not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sts.create', [
            'model' => new KeuanganTaSts,
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
        $model=new KeuanganTaSts;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaSts saved successfully');
            return redirect()->route('keuangan_ta_sts.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaSts');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaSts  $keuangantasts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaSts $keuangantasts)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_sts.edit', [
            'model' => $keuangantasts,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSts  $keuangantasts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaSts $keuangantasts)
    {
        $keuangantasts->fill($request->all());

        if ($keuangantasts->save()) {
            
            session()->flash('app_message', 'KeuanganTaSts successfully updated');
            return redirect()->route('keuangan_ta_sts.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaSts');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaSts  $keuangantasts
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaSts $keuangantasts)
    {
        if ($keuangantasts->delete()) {
                session()->flash('app_message', 'KeuanganTaSts successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaSts');
            }

        return redirect()->back();
    }
}
