<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisResponModel;


/**
 * Description of AnalisisResponController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisResponController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_respon.index', ['records' => AnalisisResponModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponModel  $analisisresponmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisResponModel $analisisresponmodel)
    {
        return view('pages.analisis_respon.show', [
                'record' =>$analisisresponmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_respon.create', [
            'model' => new AnalisisResponModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisResponModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisResponModel saved successfully');
            return redirect()->route('analisis_respon.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisResponModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponModel  $analisisresponmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisResponModel $analisisresponmodel)
    {

        return view('pages.analisis_respon.edit', [
            'model' => $analisisresponmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponModel  $analisisresponmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisResponModel $analisisresponmodel)
    {
        $analisisresponmodel->fill($request->all());

        if ($analisisresponmodel->save()) {
            
            session()->flash('app_message', 'AnalisisResponModel successfully updated');
            return redirect()->route('analisis_respon.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisResponModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponModel  $analisisresponmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisResponModel $analisisresponmodel)
    {
        if ($analisisresponmodel->delete()) {
                session()->flash('app_message', 'AnalisisResponModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisResponModel');
            }

        return redirect()->back();
    }
}
