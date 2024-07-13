<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisRefState;


/**
 * Description of AnalisisRefStateController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisRefStateController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_ref_state.index', ['records' => AnalisisRefState::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefState  $analisisrefstate
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisRefState $analisisrefstate)
    {
        return view('pages.analisis_ref_state.show', [
                'record' =>$analisisrefstate,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_ref_state.create', [
            'model' => new AnalisisRefState,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisRefState;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisRefState saved successfully');
            return redirect()->route('analisis_ref_state.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisRefState');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisRefState  $analisisrefstate
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisRefState $analisisrefstate)
    {

        return view('pages.analisis_ref_state.edit', [
            'model' => $analisisrefstate,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefState  $analisisrefstate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisRefState $analisisrefstate)
    {
        $analisisrefstate->fill($request->all());

        if ($analisisrefstate->save()) {
            
            session()->flash('app_message', 'AnalisisRefState successfully updated');
            return redirect()->route('analisis_ref_state.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisRefState');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisRefState  $analisisrefstate
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisRefState $analisisrefstate)
    {
        if ($analisisrefstate->delete()) {
                session()->flash('app_message', 'AnalisisRefState successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisRefState');
            }

        return redirect()->back();
    }
}
