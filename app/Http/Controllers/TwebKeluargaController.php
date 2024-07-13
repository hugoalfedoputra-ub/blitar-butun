<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebKeluargaModel;


/**
 * Description of TwebKeluargaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebKeluargaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_keluarga.index', ['records' => TwebKeluargaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaModel  $twebkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebKeluargaModel $twebkeluargamodel)
    {
        return view('pages.tweb_keluarga.show', [
                'record' =>$twebkeluargamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_keluarga.create', [
            'model' => new TwebKeluargaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebKeluargaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebKeluargaModel saved successfully');
            return redirect()->route('tweb_keluarga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebKeluargaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaModel  $twebkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebKeluargaModel $twebkeluargamodel)
    {

        return view('pages.tweb_keluarga.edit', [
            'model' => $twebkeluargamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaModel  $twebkeluargamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebKeluargaModel $twebkeluargamodel)
    {
        $twebkeluargamodel->fill($request->all());

        if ($twebkeluargamodel->save()) {
            
            session()->flash('app_message', 'TwebKeluargaModel successfully updated');
            return redirect()->route('tweb_keluarga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebKeluargaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaModel  $twebkeluargamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebKeluargaModel $twebkeluargamodel)
    {
        if ($twebkeluargamodel->delete()) {
                session()->flash('app_message', 'TwebKeluargaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebKeluargaModel');
            }

        return redirect()->back();
    }
}
