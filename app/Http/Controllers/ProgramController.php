<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramModel;


/**
 * Description of ProgramController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProgramController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.program.index', ['records' => ProgramModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramModel  $programmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProgramModel $programmodel)
    {
        return view('pages.program.show', [
                'record' =>$programmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.program.create', [
            'model' => new ProgramModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ProgramModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProgramModel saved successfully');
            return redirect()->route('program.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProgramModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramModel  $programmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProgramModel $programmodel)
    {

        return view('pages.program.edit', [
            'model' => $programmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProgramModel  $programmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProgramModel $programmodel)
    {
        $programmodel->fill($request->all());

        if ($programmodel->save()) {
            
            session()->flash('app_message', 'ProgramModel successfully updated');
            return redirect()->route('program.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProgramModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProgramModel  $programmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProgramModel $programmodel)
    {
        if ($programmodel->delete()) {
                session()->flash('app_message', 'ProgramModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProgramModel');
            }

        return redirect()->back();
    }
}
