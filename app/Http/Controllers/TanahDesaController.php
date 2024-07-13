<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TanahDesaModel;


/**
 * Description of TanahDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TanahDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tanah_desa.index', ['records' => TanahDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TanahDesaModel  $tanahdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TanahDesaModel $tanahdesamodel)
    {
        return view('pages.tanah_desa.show', [
                'record' =>$tanahdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tanah_desa.create', [
            'model' => new TanahDesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TanahDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TanahDesaModel saved successfully');
            return redirect()->route('tanah_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TanahDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TanahDesaModel  $tanahdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TanahDesaModel $tanahdesamodel)
    {

        return view('pages.tanah_desa.edit', [
            'model' => $tanahdesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TanahDesaModel  $tanahdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TanahDesaModel $tanahdesamodel)
    {
        $tanahdesamodel->fill($request->all());

        if ($tanahdesamodel->save()) {
            
            session()->flash('app_message', 'TanahDesaModel successfully updated');
            return redirect()->route('tanah_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TanahDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TanahDesaModel  $tanahdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TanahDesaModel $tanahdesamodel)
    {
        if ($tanahdesamodel->delete()) {
                session()->flash('app_message', 'TanahDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TanahDesaModel');
            }

        return redirect()->back();
    }
}
