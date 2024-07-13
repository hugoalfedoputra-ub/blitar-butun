<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisIndikatorModel;


/**
 * Description of AnalisisIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_indikator.index', ['records' => AnalisisIndikatorModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisIndikatorModel  $analisisindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisIndikatorModel $analisisindikatormodel)
    {
        return view('pages.analisis_indikator.show', [
                'record' =>$analisisindikatormodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_indikator.create', [
            'model' => new AnalisisIndikatorModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisIndikatorModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisIndikatorModel saved successfully');
            return redirect()->route('analisis_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisIndikatorModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisIndikatorModel  $analisisindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisIndikatorModel $analisisindikatormodel)
    {

        return view('pages.analisis_indikator.edit', [
            'model' => $analisisindikatormodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisIndikatorModel  $analisisindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisIndikatorModel $analisisindikatormodel)
    {
        $analisisindikatormodel->fill($request->all());

        if ($analisisindikatormodel->save()) {
            
            session()->flash('app_message', 'AnalisisIndikatorModel successfully updated');
            return redirect()->route('analisis_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisIndikatorModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisIndikatorModel  $analisisindikatormodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisIndikatorModel $analisisindikatormodel)
    {
        if ($analisisindikatormodel->delete()) {
                session()->flash('app_message', 'AnalisisIndikatorModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisIndikatorModel');
            }

        return redirect()->back();
    }
}
