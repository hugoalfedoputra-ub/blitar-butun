<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisPeriodeModel;


/**
 * Description of AnalisisPeriodeController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisPeriodeController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_periode.index', ['records' => AnalisisPeriodeModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPeriodeModel  $analisisperiodemodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisPeriodeModel $analisisperiodemodel)
    {
        return view('pages.analisis_periode.show', [
                'record' =>$analisisperiodemodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_periode.create', [
            'model' => new AnalisisPeriodeModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisPeriodeModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisPeriodeModel saved successfully');
            return redirect()->route('analisis_periode.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisPeriodeModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPeriodeModel  $analisisperiodemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisPeriodeModel $analisisperiodemodel)
    {

        return view('pages.analisis_periode.edit', [
            'model' => $analisisperiodemodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisPeriodeModel  $analisisperiodemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisPeriodeModel $analisisperiodemodel)
    {
        $analisisperiodemodel->fill($request->all());

        if ($analisisperiodemodel->save()) {
            
            session()->flash('app_message', 'AnalisisPeriodeModel successfully updated');
            return redirect()->route('analisis_periode.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisPeriodeModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisPeriodeModel  $analisisperiodemodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisPeriodeModel $analisisperiodemodel)
    {
        if ($analisisperiodemodel->delete()) {
                session()->flash('app_message', 'AnalisisPeriodeModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisPeriodeModel');
            }

        return redirect()->back();
    }
}
