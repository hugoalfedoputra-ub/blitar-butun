<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogRestoreDesaModel;


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
        return view('pages.log_restore_desa.index', ['records' => LogRestoreDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogRestoreDesaModel  $logrestoredesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogRestoreDesaModel $logrestoredesamodel)
    {
        return view('pages.log_restore_desa.show', [
                'record' =>$logrestoredesamodel,
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
            'model' => new LogRestoreDesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogRestoreDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogRestoreDesaModel saved successfully');
            return redirect()->route('log_restore_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogRestoreDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogRestoreDesaModel  $logrestoredesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogRestoreDesaModel $logrestoredesamodel)
    {

        return view('pages.log_restore_desa.edit', [
            'model' => $logrestoredesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogRestoreDesaModel  $logrestoredesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogRestoreDesaModel $logrestoredesamodel)
    {
        $logrestoredesamodel->fill($request->all());

        if ($logrestoredesamodel->save()) {
            
            session()->flash('app_message', 'LogRestoreDesaModel successfully updated');
            return redirect()->route('log_restore_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogRestoreDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogRestoreDesaModel  $logrestoredesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogRestoreDesaModel $logrestoredesamodel)
    {
        if ($logrestoredesamodel->delete()) {
                session()->flash('app_message', 'LogRestoreDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogRestoreDesaModel');
            }

        return redirect()->back();
    }
}
