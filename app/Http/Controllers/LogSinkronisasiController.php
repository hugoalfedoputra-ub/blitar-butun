<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogSinkronisasi;


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
        return LogSinkronisasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogSinkronisasi  $logsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $logsinkronisasi = LogSinkronisasi::find($id);
        if ($logsinkronisasi) {
            return response()->json($logsinkronisasi);
        }
        return response()->json(['message' => 'LogSinkronisasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_sinkronisasi.create', [
            'model' => new LogSinkronisasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogSinkronisasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogSinkronisasi saved successfully');
            return redirect()->route('log_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogSinkronisasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogSinkronisasi  $logsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogSinkronisasi $logsinkronisasi)
    {

        return view('pages.log_sinkronisasi.edit', [
            'model' => $logsinkronisasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogSinkronisasi  $logsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogSinkronisasi $logsinkronisasi)
    {
        $logsinkronisasi->fill($request->all());

        if ($logsinkronisasi->save()) {
            
            session()->flash('app_message', 'LogSinkronisasi successfully updated');
            return redirect()->route('log_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogSinkronisasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogSinkronisasi  $logsinkronisasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogSinkronisasi $logsinkronisasi)
    {
        if ($logsinkronisasi->delete()) {
                session()->flash('app_message', 'LogSinkronisasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogSinkronisasi');
            }

        return redirect()->back();
    }
}
