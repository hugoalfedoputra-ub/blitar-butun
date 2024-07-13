<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaAnggaranLog;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaAnggaranLogController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaAnggaranLogController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaAnggaranLog::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLog  $keuangantaanggaranlog
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $keuangantaanggaranlog = KeuanganTaAnggaranLog::find($id);
        if ($keuangantaanggaranlog) {
            return response()->json($keuangantaanggaranlog);
        }
        return response()->json(['message' => 'KeuanganTaAnggaranLog not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran_log.create', [
            'model' => new KeuanganTaAnggaranLog,
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
        $model=new KeuanganTaAnggaranLog;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranLog saved successfully');
            return redirect()->route('keuangan_ta_anggaran_log.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaAnggaranLog');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLog  $keuangantaanggaranlog
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaAnggaranLog $keuangantaanggaranlog)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_anggaran_log.edit', [
            'model' => $keuangantaanggaranlog,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLog  $keuangantaanggaranlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaAnggaranLog $keuangantaanggaranlog)
    {
        $keuangantaanggaranlog->fill($request->all());

        if ($keuangantaanggaranlog->save()) {
            
            session()->flash('app_message', 'KeuanganTaAnggaranLog successfully updated');
            return redirect()->route('keuangan_ta_anggaran_log.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaAnggaranLog');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaAnggaranLog  $keuangantaanggaranlog
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaAnggaranLog $keuangantaanggaranlog)
    {
        if ($keuangantaanggaranlog->delete()) {
                session()->flash('app_message', 'KeuanganTaAnggaranLog successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaAnggaranLog');
            }

        return redirect()->back();
    }
}
