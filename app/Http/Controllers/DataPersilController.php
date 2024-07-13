<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersilModel;


/**
 * Description of DataPersilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.data_persil.index', ['records' => DataPersilModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilModel  $datapersilmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataPersilModel $datapersilmodel)
    {
        return view('pages.data_persil.show', [
                'record' =>$datapersilmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil.create', [
            'model' => new DataPersilModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersilModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersilModel saved successfully');
            return redirect()->route('data_persil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersilModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilModel  $datapersilmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersilModel $datapersilmodel)
    {

        return view('pages.data_persil.edit', [
            'model' => $datapersilmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersilModel  $datapersilmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersilModel $datapersilmodel)
    {
        $datapersilmodel->fill($request->all());

        if ($datapersilmodel->save()) {
            
            session()->flash('app_message', 'DataPersilModel successfully updated');
            return redirect()->route('data_persil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersilModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersilModel  $datapersilmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersilModel $datapersilmodel)
    {
        if ($datapersilmodel->delete()) {
                session()->flash('app_message', 'DataPersilModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersilModel');
            }

        return redirect()->back();
    }
}
