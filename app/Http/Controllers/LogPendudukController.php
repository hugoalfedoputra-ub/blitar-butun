<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogPendudukModel;
use App\Models\RefPindah;


/**
 * Description of LogPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_penduduk.index', ['records' => LogPendudukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogPendudukModel  $logpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogPendudukModel $logpendudukmodel)
    {
        return view('pages.log_penduduk.show', [
                'record' =>$logpendudukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$ref_pindah = RefPindah::all(['id']);

        return view('pages.log_penduduk.create', [
            'model' => new LogPendudukModel,
			"ref_pindah" => $ref_pindah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogPendudukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogPendudukModel saved successfully');
            return redirect()->route('log_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogPendudukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogPendudukModel  $logpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogPendudukModel $logpendudukmodel)
    {
		$ref_pindah = RefPindah::all(['id']);

        return view('pages.log_penduduk.edit', [
            'model' => $logpendudukmodel,
			"ref_pindah" => $ref_pindah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogPendudukModel  $logpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogPendudukModel $logpendudukmodel)
    {
        $logpendudukmodel->fill($request->all());

        if ($logpendudukmodel->save()) {
            
            session()->flash('app_message', 'LogPendudukModel successfully updated');
            return redirect()->route('log_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogPendudukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogPendudukModel  $logpendudukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogPendudukModel $logpendudukmodel)
    {
        if ($logpendudukmodel->delete()) {
                session()->flash('app_message', 'LogPendudukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogPendudukModel');
            }

        return redirect()->back();
    }
}
