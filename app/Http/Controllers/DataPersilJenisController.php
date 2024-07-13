<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersilJenisModel;


/**
 * Description of DataPersilJenisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilJenisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.data_persil_jenis.index', ['records' => DataPersilJenisModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilJenisModel  $datapersiljenismodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataPersilJenisModel $datapersiljenismodel)
    {
        return view('pages.data_persil_jenis.show', [
                'record' =>$datapersiljenismodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil_jenis.create', [
            'model' => new DataPersilJenisModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersilJenisModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersilJenisModel saved successfully');
            return redirect()->route('data_persil_jenis.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersilJenisModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilJenisModel  $datapersiljenismodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersilJenisModel $datapersiljenismodel)
    {

        return view('pages.data_persil_jenis.edit', [
            'model' => $datapersiljenismodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersilJenisModel  $datapersiljenismodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersilJenisModel $datapersiljenismodel)
    {
        $datapersiljenismodel->fill($request->all());

        if ($datapersiljenismodel->save()) {
            
            session()->flash('app_message', 'DataPersilJenisModel successfully updated');
            return redirect()->route('data_persil_jenis.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersilJenisModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersilJenisModel  $datapersiljenismodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersilJenisModel $datapersiljenismodel)
    {
        if ($datapersiljenismodel->delete()) {
                session()->flash('app_message', 'DataPersilJenisModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersilJenisModel');
            }

        return redirect()->back();
    }
}
