<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogEksporModel;


/**
 * Description of LogEksporController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogEksporController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_ekspor.index', ['records' => LogEksporModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogEksporModel  $logekspormodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogEksporModel $logekspormodel)
    {
        return view('pages.log_ekspor.show', [
                'record' =>$logekspormodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_ekspor.create', [
            'model' => new LogEksporModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogEksporModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogEksporModel saved successfully');
            return redirect()->route('log_ekspor.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogEksporModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogEksporModel  $logekspormodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogEksporModel $logekspormodel)
    {

        return view('pages.log_ekspor.edit', [
            'model' => $logekspormodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogEksporModel  $logekspormodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogEksporModel $logekspormodel)
    {
        $logekspormodel->fill($request->all());

        if ($logekspormodel->save()) {
            
            session()->flash('app_message', 'LogEksporModel successfully updated');
            return redirect()->route('log_ekspor.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogEksporModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogEksporModel  $logekspormodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogEksporModel $logekspormodel)
    {
        if ($logekspormodel->delete()) {
                session()->flash('app_message', 'LogEksporModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogEksporModel');
            }

        return redirect()->back();
    }
}
