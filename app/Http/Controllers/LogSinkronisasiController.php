<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogSinkronisasiModel;


/**
 * Description of LogSinkronisasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogSinkronisasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_sinkronisasi.index', ['records' => LogSinkronisasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogSinkronisasiModel  $logsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogSinkronisasiModel $logsinkronisasimodel)
    {
        return view('pages.log_sinkronisasi.show', [
                'record' =>$logsinkronisasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_sinkronisasi.create', [
            'model' => new LogSinkronisasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogSinkronisasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogSinkronisasiModel saved successfully');
            return redirect()->route('log_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogSinkronisasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogSinkronisasiModel  $logsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogSinkronisasiModel $logsinkronisasimodel)
    {

        return view('pages.log_sinkronisasi.edit', [
            'model' => $logsinkronisasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogSinkronisasiModel  $logsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogSinkronisasiModel $logsinkronisasimodel)
    {
        $logsinkronisasimodel->fill($request->all());

        if ($logsinkronisasimodel->save()) {
            
            session()->flash('app_message', 'LogSinkronisasiModel successfully updated');
            return redirect()->route('log_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogSinkronisasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogSinkronisasiModel  $logsinkronisasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogSinkronisasiModel $logsinkronisasimodel)
    {
        if ($logsinkronisasimodel->delete()) {
                session()->flash('app_message', 'LogSinkronisasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogSinkronisasiModel');
            }

        return redirect()->back();
    }
}
