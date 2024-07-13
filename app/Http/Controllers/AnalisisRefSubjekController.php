<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisRefSubjekModel;


/**
 * Description of AnalisisRefSubjekController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisRefSubjekController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_ref_subjek.index', ['records' => AnalisisRefSubjekModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjekModel  $analisisrefsubjekmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisRefSubjekModel $analisisrefsubjekmodel)
    {
        return view('pages.analisis_ref_subjek.show', [
                'record' =>$analisisrefsubjekmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_ref_subjek.create', [
            'model' => new AnalisisRefSubjekModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisRefSubjekModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisRefSubjekModel saved successfully');
            return redirect()->route('analisis_ref_subjek.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisRefSubjekModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjekModel  $analisisrefsubjekmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisRefSubjekModel $analisisrefsubjekmodel)
    {

        return view('pages.analisis_ref_subjek.edit', [
            'model' => $analisisrefsubjekmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjekModel  $analisisrefsubjekmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisRefSubjekModel $analisisrefsubjekmodel)
    {
        $analisisrefsubjekmodel->fill($request->all());

        if ($analisisrefsubjekmodel->save()) {
            
            session()->flash('app_message', 'AnalisisRefSubjekModel successfully updated');
            return redirect()->route('analisis_ref_subjek.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisRefSubjekModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefSubjekModel  $analisisrefsubjekmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisRefSubjekModel $analisisrefsubjekmodel)
    {
        if ($analisisrefsubjekmodel->delete()) {
                session()->flash('app_message', 'AnalisisRefSubjekModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisRefSubjekModel');
            }

        return redirect()->back();
    }
}
