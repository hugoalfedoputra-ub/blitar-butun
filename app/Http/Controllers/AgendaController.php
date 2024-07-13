<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgendaModel;
use App\Models\Artikel;


/**
 * Description of AgendaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AgendaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.agenda.index', ['records' => AgendaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AgendaModel  $agendamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AgendaModel $agendamodel)
    {
        return view('pages.agenda.show', [
                'record' =>$agendamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$artikel = Artikel::all(['id']);

        return view('pages.agenda.create', [
            'model' => new AgendaModel,
			"artikel" => $artikel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AgendaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AgendaModel saved successfully');
            return redirect()->route('agenda.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AgendaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AgendaModel  $agendamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AgendaModel $agendamodel)
    {
		$artikel = Artikel::all(['id']);

        return view('pages.agenda.edit', [
            'model' => $agendamodel,
			"artikel" => $artikel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AgendaModel  $agendamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AgendaModel $agendamodel)
    {
        $agendamodel->fill($request->all());

        if ($agendamodel->save()) {
            
            session()->flash('app_message', 'AgendaModel successfully updated');
            return redirect()->route('agenda.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AgendaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AgendaModel  $agendamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AgendaModel $agendamodel)
    {
        if ($agendamodel->delete()) {
                session()->flash('app_message', 'AgendaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AgendaModel');
            }

        return redirect()->back();
    }
}
