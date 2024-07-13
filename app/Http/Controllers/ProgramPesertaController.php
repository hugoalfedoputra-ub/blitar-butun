<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProgramPeserta;


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
        return view('pages.program_peserta.index', ['records' => ProgramPeserta::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramPeserta  $programpeserta
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProgramPeserta $programpeserta)
    {
        return view('pages.program_peserta.show', [
                'record' =>$programpeserta,
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
            'model' => new ProgramPeserta,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ProgramPeserta;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ProgramPeserta saved successfully');
            return redirect()->route('program_peserta.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ProgramPeserta');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ProgramPeserta  $programpeserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProgramPeserta $programpeserta)
    {

        return view('pages.program_peserta.edit', [
            'model' => $programpeserta,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ProgramPeserta  $programpeserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProgramPeserta $programpeserta)
    {
        $programpeserta->fill($request->all());

        if ($programpeserta->save()) {
            
            session()->flash('app_message', 'ProgramPeserta successfully updated');
            return redirect()->route('program_peserta.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ProgramPeserta');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ProgramPeserta  $programpeserta
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ProgramPeserta $programpeserta)
    {
        if ($programpeserta->delete()) {
                session()->flash('app_message', 'ProgramPeserta successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ProgramPeserta');
            }

        return redirect()->back();
    }
}
