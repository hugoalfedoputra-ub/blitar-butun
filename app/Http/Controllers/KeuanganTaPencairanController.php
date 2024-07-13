<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPencairan;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPencairanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPencairanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaPencairan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairan  $keuangantapencairan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantapencairan = KeuanganTaPencairan::find($id);
        if ($keuangantapencairan) {
            return response()->json($keuangantapencairan);
        }
        return response()->json(['message' => 'KeuanganTaPencairan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pencairan.create', [
            'model' => new KeuanganTaPencairan,
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
        $model=new KeuanganTaPencairan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPencairan saved successfully');
            return redirect()->route('keuangan_ta_pencairan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPencairan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairan  $keuangantapencairan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPencairan $keuangantapencairan)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pencairan.edit', [
            'model' => $keuangantapencairan,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairan  $keuangantapencairan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPencairan $keuangantapencairan)
    {
        $keuangantapencairan->fill($request->all());

        if ($keuangantapencairan->save()) {
            
            session()->flash('app_message', 'KeuanganTaPencairan successfully updated');
            return redirect()->route('keuangan_ta_pencairan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPencairan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPencairan  $keuangantapencairan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPencairan $keuangantapencairan)
    {
        if ($keuangantapencairan->delete()) {
                session()->flash('app_message', 'KeuanganTaPencairan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPencairan');
            }

        return redirect()->back();
    }
}
