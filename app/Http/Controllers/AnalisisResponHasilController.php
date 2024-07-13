<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisResponHasilModel;


/**
 * Description of AnalisisResponHasilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisResponHasilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_respon_hasil.index', ['records' => AnalisisResponHasilModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasilModel  $analisisresponhasilmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisResponHasilModel $analisisresponhasilmodel)
    {
        return view('pages.analisis_respon_hasil.show', [
                'record' =>$analisisresponhasilmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_respon_hasil.create', [
            'model' => new AnalisisResponHasilModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisResponHasilModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisResponHasilModel saved successfully');
            return redirect()->route('analisis_respon_hasil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisResponHasilModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasilModel  $analisisresponhasilmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisResponHasilModel $analisisresponhasilmodel)
    {

        return view('pages.analisis_respon_hasil.edit', [
            'model' => $analisisresponhasilmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasilModel  $analisisresponhasilmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisResponHasilModel $analisisresponhasilmodel)
    {
        $analisisresponhasilmodel->fill($request->all());

        if ($analisisresponhasilmodel->save()) {
            
            session()->flash('app_message', 'AnalisisResponHasilModel successfully updated');
            return redirect()->route('analisis_respon_hasil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisResponHasilModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasilModel  $analisisresponhasilmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisResponHasilModel $analisisresponhasilmodel)
    {
        if ($analisisresponhasilmodel->delete()) {
                session()->flash('app_message', 'AnalisisResponHasilModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisResponHasilModel');
            }

        return redirect()->back();
    }
}
