<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramPesertaModel;


/**
 * Description of ProgramPesertaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ProgramPesertaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.program_peserta.index', ['records' => ProgramPesertaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramPesertaModel  $programpesertamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProgramPesertaModel $programpesertamodel)
    {
        return view('pages.program_peserta.show', [
                'record' =>$programpesertamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.program_peserta.create', [
            'model' => new ProgramPesertaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ProgramPesertaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProgramPesertaModel saved successfully');
            return redirect()->route('program_peserta.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProgramPesertaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramPesertaModel  $programpesertamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProgramPesertaModel $programpesertamodel)
    {

        return view('pages.program_peserta.edit', [
            'model' => $programpesertamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProgramPesertaModel  $programpesertamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProgramPesertaModel $programpesertamodel)
    {
        $programpesertamodel->fill($request->all());

        if ($programpesertamodel->save()) {
            
            session()->flash('app_message', 'ProgramPesertaModel successfully updated');
            return redirect()->route('program_peserta.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProgramPesertaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProgramPesertaModel  $programpesertamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProgramPesertaModel $programpesertamodel)
    {
        if ($programpesertamodel->delete()) {
                session()->flash('app_message', 'ProgramPesertaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProgramPesertaModel');
            }

        return redirect()->back();
    }
}
