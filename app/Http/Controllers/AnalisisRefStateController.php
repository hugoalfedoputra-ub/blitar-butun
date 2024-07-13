<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisRefStateModel;


/**
 * Description of AnalisisRefStateController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisRefStateController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_ref_state.index', ['records' => AnalisisRefStateModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefStateModel  $analisisrefstatemodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisRefStateModel $analisisrefstatemodel)
    {
        return view('pages.analisis_ref_state.show', [
                'record' =>$analisisrefstatemodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_ref_state.create', [
            'model' => new AnalisisRefStateModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisRefStateModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisRefStateModel saved successfully');
            return redirect()->route('analisis_ref_state.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisRefStateModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefStateModel  $analisisrefstatemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisRefStateModel $analisisrefstatemodel)
    {

        return view('pages.analisis_ref_state.edit', [
            'model' => $analisisrefstatemodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefStateModel  $analisisrefstatemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisRefStateModel $analisisrefstatemodel)
    {
        $analisisrefstatemodel->fill($request->all());

        if ($analisisrefstatemodel->save()) {
            
            session()->flash('app_message', 'AnalisisRefStateModel successfully updated');
            return redirect()->route('analisis_ref_state.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisRefStateModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefStateModel  $analisisrefstatemodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisRefStateModel $analisisrefstatemodel)
    {
        if ($analisisrefstatemodel->delete()) {
                session()->flash('app_message', 'AnalisisRefStateModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisRefStateModel');
            }

        return redirect()->back();
    }
}
