<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogSuratModel;


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
        return view('pages.log_surat.index', ['records' => LogSuratModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogSuratModel  $logsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogSuratModel $logsuratmodel)
    {
        return view('pages.log_surat.show', [
                'record' =>$logsuratmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_surat.create', [
            'model' => new LogSuratModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogSuratModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogSuratModel saved successfully');
            return redirect()->route('log_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogSuratModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogSuratModel  $logsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogSuratModel $logsuratmodel)
    {

        return view('pages.log_surat.edit', [
            'model' => $logsuratmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogSuratModel  $logsuratmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogSuratModel $logsuratmodel)
    {
        $logsuratmodel->fill($request->all());

        if ($logsuratmodel->save()) {
            
            session()->flash('app_message', 'LogSuratModel successfully updated');
            return redirect()->route('log_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogSuratModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogSuratModel  $logsuratmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogSuratModel $logsuratmodel)
    {
        if ($logsuratmodel->delete()) {
                session()->flash('app_message', 'LogSuratModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogSuratModel');
            }

        return redirect()->back();
    }
}
