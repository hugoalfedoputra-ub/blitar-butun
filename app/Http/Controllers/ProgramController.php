<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;


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
        return view('pages.program.index', ['records' => Program::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Program $program)
    {
        return view('pages.program.show', [
                'record' =>$program,
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
            'model' => new Program,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Program;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Program saved successfully');
            return redirect()->route('program.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Program');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Program $program)
    {

        return view('pages.program.edit', [
            'model' => $program,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Program $program)
    {
        $program->fill($request->all());

        if ($program->save()) {
            
            session()->flash('app_message', 'Program successfully updated');
            return redirect()->route('program.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Program');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Program  $program
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Program $program)
    {
        if ($program->delete()) {
                session()->flash('app_message', 'Program successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Program');
            }

        return redirect()->back();
    }
}
