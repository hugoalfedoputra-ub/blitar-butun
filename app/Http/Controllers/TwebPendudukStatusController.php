<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukStatusModel;


/**
 * Description of TwebPendudukStatusController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_status.index', ['records' => TwebPendudukStatusModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatusModel  $twebpendudukstatusmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukStatusModel $twebpendudukstatusmodel)
    {
        return view('pages.tweb_penduduk_status.show', [
                'record' =>$twebpendudukstatusmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_status.create', [
            'model' => new TwebPendudukStatusModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukStatusModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukStatusModel saved successfully');
            return redirect()->route('tweb_penduduk_status.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukStatusModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatusModel  $twebpendudukstatusmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukStatusModel $twebpendudukstatusmodel)
    {

        return view('pages.tweb_penduduk_status.edit', [
            'model' => $twebpendudukstatusmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatusModel  $twebpendudukstatusmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukStatusModel $twebpendudukstatusmodel)
    {
        $twebpendudukstatusmodel->fill($request->all());

        if ($twebpendudukstatusmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukStatusModel successfully updated');
            return redirect()->route('tweb_penduduk_status.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukStatusModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatusModel  $twebpendudukstatusmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukStatusModel $twebpendudukstatusmodel)
    {
        if ($twebpendudukstatusmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukStatusModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukStatusModel');
            }

        return redirect()->back();
    }
}
