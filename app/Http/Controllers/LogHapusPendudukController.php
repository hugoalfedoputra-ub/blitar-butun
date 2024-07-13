<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogHapusPendudukModel;


/**
 * Description of LogHapusPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogHapusPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_hapus_penduduk.index', ['records' => LogHapusPendudukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogHapusPendudukModel  $loghapuspendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogHapusPendudukModel $loghapuspendudukmodel)
    {
        return view('pages.log_hapus_penduduk.show', [
                'record' =>$loghapuspendudukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_hapus_penduduk.create', [
            'model' => new LogHapusPendudukModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogHapusPendudukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogHapusPendudukModel saved successfully');
            return redirect()->route('log_hapus_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogHapusPendudukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogHapusPendudukModel  $loghapuspendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogHapusPendudukModel $loghapuspendudukmodel)
    {

        return view('pages.log_hapus_penduduk.edit', [
            'model' => $loghapuspendudukmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogHapusPendudukModel  $loghapuspendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogHapusPendudukModel $loghapuspendudukmodel)
    {
        $loghapuspendudukmodel->fill($request->all());

        if ($loghapuspendudukmodel->save()) {
            
            session()->flash('app_message', 'LogHapusPendudukModel successfully updated');
            return redirect()->route('log_hapus_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogHapusPendudukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogHapusPendudukModel  $loghapuspendudukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogHapusPendudukModel $loghapuspendudukmodel)
    {
        if ($loghapuspendudukmodel->delete()) {
                session()->flash('app_message', 'LogHapusPendudukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogHapusPendudukModel');
            }

        return redirect()->back();
    }
}
