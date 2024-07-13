<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataSuratModel;


/**
 * Description of DataSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.data_surat.index', ['records' => DataSuratModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataSuratModel  $datasuratmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DataSuratModel $datasuratmodel)
    {
        return view('pages.data_surat.show', [
                'record' =>$datasuratmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_surat.create', [
            'model' => new DataSuratModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataSuratModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataSuratModel saved successfully');
            return redirect()->route('data_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataSuratModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataSuratModel  $datasuratmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataSuratModel $datasuratmodel)
    {

        return view('pages.data_surat.edit', [
            'model' => $datasuratmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataSuratModel  $datasuratmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataSuratModel $datasuratmodel)
    {
        $datasuratmodel->fill($request->all());

        if ($datasuratmodel->save()) {
            
            session()->flash('app_message', 'DataSuratModel successfully updated');
            return redirect()->route('data_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataSuratModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataSuratModel  $datasuratmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataSuratModel $datasuratmodel)
    {
        if ($datasuratmodel->delete()) {
                session()->flash('app_message', 'DataSuratModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataSuratModel');
            }

        return redirect()->back();
    }
}
