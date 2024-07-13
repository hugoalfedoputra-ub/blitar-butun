<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogTteModel;


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
        return view('pages.log_tte.index', ['records' => LogTteModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogTteModel  $logttemodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogTteModel $logttemodel)
    {
        return view('pages.log_tte.show', [
                'record' =>$logttemodel,
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
            'model' => new LogTteModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogTteModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogTteModel saved successfully');
            return redirect()->route('log_tte.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogTteModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogTteModel  $logttemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogTteModel $logttemodel)
    {

        return view('pages.log_tte.edit', [
            'model' => $logttemodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogTteModel  $logttemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogTteModel $logttemodel)
    {
        $logttemodel->fill($request->all());

        if ($logttemodel->save()) {
            
            session()->flash('app_message', 'LogTteModel successfully updated');
            return redirect()->route('log_tte.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogTteModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogTteModel  $logttemodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogTteModel $logttemodel)
    {
        if ($logttemodel->delete()) {
                session()->flash('app_message', 'LogTteModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogTteModel');
            }

        return redirect()->back();
    }
}
