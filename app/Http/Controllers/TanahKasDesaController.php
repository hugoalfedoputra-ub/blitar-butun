<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TanahKasDesaModel;


/**
 * Description of TanahKasDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TanahKasDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tanah_kas_desa.index', ['records' => TanahKasDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TanahKasDesaModel  $tanahkasdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TanahKasDesaModel $tanahkasdesamodel)
    {
        return view('pages.tanah_kas_desa.show', [
                'record' =>$tanahkasdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tanah_kas_desa.create', [
            'model' => new TanahKasDesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TanahKasDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TanahKasDesaModel saved successfully');
            return redirect()->route('tanah_kas_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TanahKasDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TanahKasDesaModel  $tanahkasdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TanahKasDesaModel $tanahkasdesamodel)
    {

        return view('pages.tanah_kas_desa.edit', [
            'model' => $tanahkasdesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TanahKasDesaModel  $tanahkasdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TanahKasDesaModel $tanahkasdesamodel)
    {
        $tanahkasdesamodel->fill($request->all());

        if ($tanahkasdesamodel->save()) {
            
            session()->flash('app_message', 'TanahKasDesaModel successfully updated');
            return redirect()->route('tanah_kas_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TanahKasDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TanahKasDesaModel  $tanahkasdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TanahKasDesaModel $tanahkasdesamodel)
    {
        if ($tanahkasdesamodel->delete()) {
                session()->flash('app_message', 'TanahKasDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TanahKasDesaModel');
            }

        return redirect()->back();
    }
}
