<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogKeluarga;
use App\Models\LogPenduduk;


/**
 * Description of LogKeluargaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogKeluargaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_keluarga.index', ['records' => LogKeluarga::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogKeluarga  $logkeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogKeluarga $logkeluarga)
    {
        return view('pages.log_keluarga.show', [
                'record' =>$logkeluarga,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$log_penduduk = LogPenduduk::all(['id']);

        return view('pages.log_keluarga.create', [
            'model' => new LogKeluarga,
			"log_penduduk" => $log_penduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogKeluarga;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogKeluarga saved successfully');
            return redirect()->route('log_keluarga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogKeluarga');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogKeluarga  $logkeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogKeluarga $logkeluarga)
    {
		$log_penduduk = LogPenduduk::all(['id']);

        return view('pages.log_keluarga.edit', [
            'model' => $logkeluarga,
			"log_penduduk" => $log_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogKeluarga  $logkeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogKeluarga $logkeluarga)
    {
        $logkeluarga->fill($request->all());

        if ($logkeluarga->save()) {
            
            session()->flash('app_message', 'LogKeluarga successfully updated');
            return redirect()->route('log_keluarga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogKeluarga');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogKeluarga  $logkeluarga
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogKeluarga $logkeluarga)
    {
        if ($logkeluarga->delete()) {
                session()->flash('app_message', 'LogKeluarga successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogKeluarga');
            }

        return redirect()->back();
    }
}
