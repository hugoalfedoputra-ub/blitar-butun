<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogPerubahanPendudukModel;


/**
 * Description of LogPerubahanPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogPerubahanPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_perubahan_penduduk.index', ['records' => LogPerubahanPendudukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogPerubahanPendudukModel  $logperubahanpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogPerubahanPendudukModel $logperubahanpendudukmodel)
    {
        return view('pages.log_perubahan_penduduk.show', [
                'record' =>$logperubahanpendudukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_perubahan_penduduk.create', [
            'model' => new LogPerubahanPendudukModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogPerubahanPendudukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogPerubahanPendudukModel saved successfully');
            return redirect()->route('log_perubahan_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogPerubahanPendudukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogPerubahanPendudukModel  $logperubahanpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogPerubahanPendudukModel $logperubahanpendudukmodel)
    {

        return view('pages.log_perubahan_penduduk.edit', [
            'model' => $logperubahanpendudukmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogPerubahanPendudukModel  $logperubahanpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogPerubahanPendudukModel $logperubahanpendudukmodel)
    {
        $logperubahanpendudukmodel->fill($request->all());

        if ($logperubahanpendudukmodel->save()) {
            
            session()->flash('app_message', 'LogPerubahanPendudukModel successfully updated');
            return redirect()->route('log_perubahan_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogPerubahanPendudukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogPerubahanPendudukModel  $logperubahanpendudukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogPerubahanPendudukModel $logperubahanpendudukmodel)
    {
        if ($logperubahanpendudukmodel->delete()) {
                session()->flash('app_message', 'LogPerubahanPendudukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogPerubahanPendudukModel');
            }

        return redirect()->back();
    }
}
