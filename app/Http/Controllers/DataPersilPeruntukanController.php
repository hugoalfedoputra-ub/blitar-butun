<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersilPeruntukanModel;


/**
 * Description of DataPersilPeruntukanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilPeruntukanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.data_persil_peruntukan.index', ['records' => DataPersilPeruntukanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukanModel  $datapersilperuntukanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataPersilPeruntukanModel $datapersilperuntukanmodel)
    {
        return view('pages.data_persil_peruntukan.show', [
                'record' =>$datapersilperuntukanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil_peruntukan.create', [
            'model' => new DataPersilPeruntukanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersilPeruntukanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersilPeruntukanModel saved successfully');
            return redirect()->route('data_persil_peruntukan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersilPeruntukanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukanModel  $datapersilperuntukanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersilPeruntukanModel $datapersilperuntukanmodel)
    {

        return view('pages.data_persil_peruntukan.edit', [
            'model' => $datapersilperuntukanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukanModel  $datapersilperuntukanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersilPeruntukanModel $datapersilperuntukanmodel)
    {
        $datapersilperuntukanmodel->fill($request->all());

        if ($datapersilperuntukanmodel->save()) {
            
            session()->flash('app_message', 'DataPersilPeruntukanModel successfully updated');
            return redirect()->route('data_persil_peruntukan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersilPeruntukanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersilPeruntukanModel  $datapersilperuntukanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersilPeruntukanModel $datapersilperuntukanmodel)
    {
        if ($datapersilperuntukanmodel->delete()) {
                session()->flash('app_message', 'DataPersilPeruntukanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersilPeruntukanModel');
            }

        return redirect()->back();
    }
}
