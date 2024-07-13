<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendapatModel;


/**
 * Description of PendapatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PendapatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pendapat.index', ['records' => PendapatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PendapatModel  $pendapatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PendapatModel $pendapatmodel)
    {
        return view('pages.pendapat.show', [
                'record' =>$pendapatmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pendapat.create', [
            'model' => new PendapatModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PendapatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PendapatModel saved successfully');
            return redirect()->route('pendapat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PendapatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PendapatModel  $pendapatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PendapatModel $pendapatmodel)
    {

        return view('pages.pendapat.edit', [
            'model' => $pendapatmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PendapatModel  $pendapatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PendapatModel $pendapatmodel)
    {
        $pendapatmodel->fill($request->all());

        if ($pendapatmodel->save()) {
            
            session()->flash('app_message', 'PendapatModel successfully updated');
            return redirect()->route('pendapat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PendapatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PendapatModel  $pendapatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PendapatModel $pendapatmodel)
    {
        if ($pendapatmodel->delete()) {
                session()->flash('app_message', 'PendapatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PendapatModel');
            }

        return redirect()->back();
    }
}
