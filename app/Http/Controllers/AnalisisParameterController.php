<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisParameter;


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
        return AnalisisParameter::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisParameter  $analisisparameter
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisParameter $analisisparameter)
    {
        return view('pages.analisis_parameter.show', [
                'record' =>$analisisparameter,
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
            'model' => new AnalisisParameter,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisParameter;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisParameter saved successfully');
            return redirect()->route('analisis_parameter.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisParameter');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisParameter  $analisisparameter
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisParameter $analisisparameter)
    {

        return view('pages.analisis_parameter.edit', [
            'model' => $analisisparameter,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisParameter  $analisisparameter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisParameter $analisisparameter)
    {
        $analisisparameter->fill($request->all());

        if ($analisisparameter->save()) {
            
            session()->flash('app_message', 'AnalisisParameter successfully updated');
            return redirect()->route('analisis_parameter.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisParameter');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisParameter  $analisisparameter
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisParameter $analisisparameter)
    {
        if ($analisisparameter->delete()) {
                session()->flash('app_message', 'AnalisisParameter successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisParameter');
            }

        return redirect()->back();
    }
}
