<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogRestoreDesa;


/**
 * Description of LogRestoreDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogRestoreDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_restore_desa.index', ['records' => LogRestoreDesa::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogRestoreDesa  $logrestoredesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogRestoreDesa $logrestoredesa)
    {
        return view('pages.log_restore_desa.show', [
                'record' =>$logrestoredesa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_restore_desa.create', [
            'model' => new LogRestoreDesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogRestoreDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogRestoreDesa saved successfully');
            return redirect()->route('log_restore_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogRestoreDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogRestoreDesa  $logrestoredesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogRestoreDesa $logrestoredesa)
    {

        return view('pages.log_restore_desa.edit', [
            'model' => $logrestoredesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogRestoreDesa  $logrestoredesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogRestoreDesa $logrestoredesa)
    {
        $logrestoredesa->fill($request->all());

        if ($logrestoredesa->save()) {
            
            session()->flash('app_message', 'LogRestoreDesa successfully updated');
            return redirect()->route('log_restore_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogRestoreDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogRestoreDesa  $logrestoredesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogRestoreDesa $logrestoredesa)
    {
        if ($logrestoredesa->delete()) {
                session()->flash('app_message', 'LogRestoreDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogRestoreDesa');
            }

        return redirect()->back();
    }
}
