<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MigrasiModel;


/**
 * Description of MigrasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MigrasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.migrasi.index', ['records' => MigrasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MigrasiModel  $migrasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MigrasiModel $migrasimodel)
    {
        return view('pages.migrasi.show', [
                'record' =>$migrasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.migrasi.create', [
            'model' => new MigrasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MigrasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MigrasiModel saved successfully');
            return redirect()->route('migrasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MigrasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MigrasiModel  $migrasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MigrasiModel $migrasimodel)
    {

        return view('pages.migrasi.edit', [
            'model' => $migrasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MigrasiModel  $migrasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MigrasiModel $migrasimodel)
    {
        $migrasimodel->fill($request->all());

        if ($migrasimodel->save()) {
            
            session()->flash('app_message', 'MigrasiModel successfully updated');
            return redirect()->route('migrasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MigrasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MigrasiModel  $migrasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MigrasiModel $migrasimodel)
    {
        if ($migrasimodel->delete()) {
                session()->flash('app_message', 'MigrasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MigrasiModel');
            }

        return redirect()->back();
    }
}
