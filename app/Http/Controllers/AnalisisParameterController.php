<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisParameterModel;


/**
 * Description of AnalisisParameterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisParameterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_parameter.index', ['records' => AnalisisParameterModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisParameterModel  $analisisparametermodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisParameterModel $analisisparametermodel)
    {
        return view('pages.analisis_parameter.show', [
                'record' =>$analisisparametermodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_parameter.create', [
            'model' => new AnalisisParameterModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisParameterModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisParameterModel saved successfully');
            return redirect()->route('analisis_parameter.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisParameterModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisParameterModel  $analisisparametermodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisParameterModel $analisisparametermodel)
    {

        return view('pages.analisis_parameter.edit', [
            'model' => $analisisparametermodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisParameterModel  $analisisparametermodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisParameterModel $analisisparametermodel)
    {
        $analisisparametermodel->fill($request->all());

        if ($analisisparametermodel->save()) {
            
            session()->flash('app_message', 'AnalisisParameterModel successfully updated');
            return redirect()->route('analisis_parameter.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisParameterModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisParameterModel  $analisisparametermodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisParameterModel $analisisparametermodel)
    {
        if ($analisisparametermodel->delete()) {
                session()->flash('app_message', 'AnalisisParameterModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisParameterModel');
            }

        return redirect()->back();
    }
}
