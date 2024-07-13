<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogTte;


/**
 * Description of LogTteController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogTteController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_tte.index', ['records' => LogTte::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogTte  $logtte
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogTte $logtte)
    {
        return view('pages.log_tte.show', [
                'record' =>$logtte,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_tte.create', [
            'model' => new LogTte,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogTte;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogTte saved successfully');
            return redirect()->route('log_tte.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogTte');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogTte  $logtte
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogTte $logtte)
    {

        return view('pages.log_tte.edit', [
            'model' => $logtte,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogTte  $logtte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogTte $logtte)
    {
        $logtte->fill($request->all());

        if ($logtte->save()) {
            
            session()->flash('app_message', 'LogTte successfully updated');
            return redirect()->route('log_tte.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogTte');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogTte  $logtte
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogTte $logtte)
    {
        if ($logtte->delete()) {
                session()->flash('app_message', 'LogTte successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogTte');
            }

        return redirect()->back();
    }
}
