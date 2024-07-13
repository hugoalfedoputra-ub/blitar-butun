<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogKeluargaModel;
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
        return view('pages.log_keluarga.index', ['records' => LogKeluargaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogKeluargaModel  $logkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogKeluargaModel $logkeluargamodel)
    {
        return view('pages.log_keluarga.show', [
                'record' =>$logkeluargamodel,
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
            'model' => new LogKeluargaModel,
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
        $model=new LogKeluargaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogKeluargaModel saved successfully');
            return redirect()->route('log_keluarga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogKeluargaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogKeluargaModel  $logkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogKeluargaModel $logkeluargamodel)
    {
		$log_penduduk = LogPenduduk::all(['id']);

        return view('pages.log_keluarga.edit', [
            'model' => $logkeluargamodel,
			"log_penduduk" => $log_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogKeluargaModel  $logkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogKeluargaModel $logkeluargamodel)
    {
        $logkeluargamodel->fill($request->all());

        if ($logkeluargamodel->save()) {
            
            session()->flash('app_message', 'LogKeluargaModel successfully updated');
            return redirect()->route('log_keluarga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogKeluargaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogKeluargaModel  $logkeluargamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogKeluargaModel $logkeluargamodel)
    {
        if ($logkeluargamodel->delete()) {
                session()->flash('app_message', 'LogKeluargaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogKeluargaModel');
            }

        return redirect()->back();
    }
}
