<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganMasterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganMasterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganMaster::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganMaster  $keuanganmaster
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuanganmaster = KeuanganMaster::find($id);
        if ($keuanganmaster) {
            return response()->json($keuanganmaster);
        }
        return response()->json(['message' => 'KeuanganMaster not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keuangan_master.create', [
            'model' => new KeuanganMaster,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganMaster;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganMaster saved successfully');
            return redirect()->route('keuangan_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganMaster');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganMaster  $keuanganmaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganMaster $keuanganmaster)
    {

        return view('pages.keuangan_master.edit', [
            'model' => $keuanganmaster,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganMaster  $keuanganmaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganMaster $keuanganmaster)
    {
        $keuanganmaster->fill($request->all());

        if ($keuanganmaster->save()) {
            
            session()->flash('app_message', 'KeuanganMaster successfully updated');
            return redirect()->route('keuangan_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganMaster');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganMaster  $keuanganmaster
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganMaster $keuanganmaster)
    {
        if ($keuanganmaster->delete()) {
                session()->flash('app_message', 'KeuanganMaster successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganMaster');
            }

        return redirect()->back();
    }
}
