<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukWarganegaraModel;


/**
 * Description of TwebPendudukWarganegaraController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukWarganegaraController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_warganegara.index', ['records' => TwebPendudukWarganegaraModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegaraModel  $twebpendudukwarganegaramodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukWarganegaraModel $twebpendudukwarganegaramodel)
    {
        return view('pages.tweb_penduduk_warganegara.show', [
                'record' =>$twebpendudukwarganegaramodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_warganegara.create', [
            'model' => new TwebPendudukWarganegaraModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukWarganegaraModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukWarganegaraModel saved successfully');
            return redirect()->route('tweb_penduduk_warganegara.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukWarganegaraModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegaraModel  $twebpendudukwarganegaramodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukWarganegaraModel $twebpendudukwarganegaramodel)
    {

        return view('pages.tweb_penduduk_warganegara.edit', [
            'model' => $twebpendudukwarganegaramodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegaraModel  $twebpendudukwarganegaramodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukWarganegaraModel $twebpendudukwarganegaramodel)
    {
        $twebpendudukwarganegaramodel->fill($request->all());

        if ($twebpendudukwarganegaramodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukWarganegaraModel successfully updated');
            return redirect()->route('tweb_penduduk_warganegara.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukWarganegaraModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegaraModel  $twebpendudukwarganegaramodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukWarganegaraModel $twebpendudukwarganegaramodel)
    {
        if ($twebpendudukwarganegaramodel->delete()) {
                session()->flash('app_message', 'TwebPendudukWarganegaraModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukWarganegaraModel');
            }

        return redirect()->back();
    }
}
