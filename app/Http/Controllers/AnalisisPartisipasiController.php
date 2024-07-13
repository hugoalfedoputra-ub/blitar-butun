<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisPartisipasiModel;


/**
 * Description of AnalisisPartisipasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisPartisipasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_partisipasi.index', ['records' => AnalisisPartisipasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasiModel  $analisispartisipasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisPartisipasiModel $analisispartisipasimodel)
    {
        return view('pages.analisis_partisipasi.show', [
                'record' =>$analisispartisipasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_partisipasi.create', [
            'model' => new AnalisisPartisipasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisPartisipasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisPartisipasiModel saved successfully');
            return redirect()->route('analisis_partisipasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisPartisipasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasiModel  $analisispartisipasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisPartisipasiModel $analisispartisipasimodel)
    {

        return view('pages.analisis_partisipasi.edit', [
            'model' => $analisispartisipasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasiModel  $analisispartisipasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisPartisipasiModel $analisispartisipasimodel)
    {
        $analisispartisipasimodel->fill($request->all());

        if ($analisispartisipasimodel->save()) {
            
            session()->flash('app_message', 'AnalisisPartisipasiModel successfully updated');
            return redirect()->route('analisis_partisipasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisPartisipasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasiModel  $analisispartisipasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisPartisipasiModel $analisispartisipasimodel)
    {
        if ($analisispartisipasimodel->delete()) {
                session()->flash('app_message', 'AnalisisPartisipasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisPartisipasiModel');
            }

        return redirect()->back();
    }
}
