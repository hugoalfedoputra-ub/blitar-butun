<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogBackupModel;


/**
 * Description of LogBackupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogBackupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_backup.index', ['records' => LogBackupModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogBackupModel  $logbackupmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogBackupModel $logbackupmodel)
    {
        return view('pages.log_backup.show', [
                'record' =>$logbackupmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_backup.create', [
            'model' => new LogBackupModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogBackupModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogBackupModel saved successfully');
            return redirect()->route('log_backup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogBackupModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogBackupModel  $logbackupmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogBackupModel $logbackupmodel)
    {

        return view('pages.log_backup.edit', [
            'model' => $logbackupmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogBackupModel  $logbackupmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogBackupModel $logbackupmodel)
    {
        $logbackupmodel->fill($request->all());

        if ($logbackupmodel->save()) {
            
            session()->flash('app_message', 'LogBackupModel successfully updated');
            return redirect()->route('log_backup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogBackupModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogBackupModel  $logbackupmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogBackupModel $logbackupmodel)
    {
        if ($logbackupmodel->delete()) {
                session()->flash('app_message', 'LogBackupModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogBackupModel');
            }

        return redirect()->back();
    }
}
