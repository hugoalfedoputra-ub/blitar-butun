<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogSurat;


/**
 * Description of LogSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return LogSurat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogSurat  $logsurat
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $logsurat = LogSurat::find($id);
        if ($logsurat) {
            return response()->json($logsurat);
        }
        return response()->json(['message' => 'LogSurat not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_surat.create', [
            'model' => new LogSurat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogSurat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogSurat saved successfully');
            return redirect()->route('log_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogSurat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogSurat  $logsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogSurat $logsurat)
    {

        return view('pages.log_surat.edit', [
            'model' => $logsurat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogSurat  $logsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogSurat $logsurat)
    {
        $logsurat->fill($request->all());

        if ($logsurat->save()) {
            
            session()->flash('app_message', 'LogSurat successfully updated');
            return redirect()->route('log_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogSurat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogSurat  $logsurat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogSurat $logsurat)
    {
        if ($logsurat->delete()) {
                session()->flash('app_message', 'LogSurat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogSurat');
            }

        return redirect()->back();
    }
}
