<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogTolakModel;


/**
 * Description of LogTolakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogTolakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_tolak.index', ['records' => LogTolakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogTolakModel  $logtolakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogTolakModel $logtolakmodel)
    {
        return view('pages.log_tolak.show', [
                'record' =>$logtolakmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_tolak.create', [
            'model' => new LogTolakModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogTolakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogTolakModel saved successfully');
            return redirect()->route('log_tolak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogTolakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogTolakModel  $logtolakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogTolakModel $logtolakmodel)
    {

        return view('pages.log_tolak.edit', [
            'model' => $logtolakmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogTolakModel  $logtolakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogTolakModel $logtolakmodel)
    {
        $logtolakmodel->fill($request->all());

        if ($logtolakmodel->save()) {
            
            session()->flash('app_message', 'LogTolakModel successfully updated');
            return redirect()->route('log_tolak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogTolakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogTolakModel  $logtolakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogTolakModel $logtolakmodel)
    {
        if ($logtolakmodel->delete()) {
                session()->flash('app_message', 'LogTolakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogTolakModel');
            }

        return redirect()->back();
    }
}
