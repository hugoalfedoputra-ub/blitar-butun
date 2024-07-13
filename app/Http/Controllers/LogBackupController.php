<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogBackup;


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
        return view('pages.log_backup.index', ['records' => LogBackup::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogBackup  $logbackup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogBackup $logbackup)
    {
        return view('pages.log_backup.show', [
                'record' =>$logbackup,
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
            'model' => new LogBackup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogBackup;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogBackup saved successfully');
            return redirect()->route('log_backup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogBackup');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogBackup  $logbackup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogBackup $logbackup)
    {

        return view('pages.log_backup.edit', [
            'model' => $logbackup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogBackup  $logbackup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogBackup $logbackup)
    {
        $logbackup->fill($request->all());

        if ($logbackup->save()) {
            
            session()->flash('app_message', 'LogBackup successfully updated');
            return redirect()->route('log_backup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogBackup');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogBackup  $logbackup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogBackup $logbackup)
    {
        if ($logbackup->delete()) {
                session()->flash('app_message', 'LogBackup successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogBackup');
            }

        return redirect()->back();
    }
}
