<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebStatusDasarModel;


/**
 * Description of TwebStatusDasarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebStatusDasarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_status_dasar.index', ['records' => TwebStatusDasarModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusDasarModel  $twebstatusdasarmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebStatusDasarModel $twebstatusdasarmodel)
    {
        return view('pages.tweb_status_dasar.show', [
                'record' =>$twebstatusdasarmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_status_dasar.create', [
            'model' => new TwebStatusDasarModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebStatusDasarModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebStatusDasarModel saved successfully');
            return redirect()->route('tweb_status_dasar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebStatusDasarModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusDasarModel  $twebstatusdasarmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebStatusDasarModel $twebstatusdasarmodel)
    {

        return view('pages.tweb_status_dasar.edit', [
            'model' => $twebstatusdasarmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebStatusDasarModel  $twebstatusdasarmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebStatusDasarModel $twebstatusdasarmodel)
    {
        $twebstatusdasarmodel->fill($request->all());

        if ($twebstatusdasarmodel->save()) {
            
            session()->flash('app_message', 'TwebStatusDasarModel successfully updated');
            return redirect()->route('tweb_status_dasar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebStatusDasarModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebStatusDasarModel  $twebstatusdasarmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebStatusDasarModel $twebstatusdasarmodel)
    {
        if ($twebstatusdasarmodel->delete()) {
                session()->flash('app_message', 'TwebStatusDasarModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebStatusDasarModel');
            }

        return redirect()->back();
    }
}
