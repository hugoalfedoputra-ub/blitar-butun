<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
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
        return Agenda::paginate(10);
    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Agenda $agenda)
    {
        return view('pages.agenda.show', [
            'record' => $agenda,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $artikel = Artikel::all(['id']);

        return view('pages.agenda.create', [
            'model' => new Agenda,
            "artikel" => $artikel,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Agenda;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'Agenda saved successfully');
            return redirect()->route('agenda.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Agenda');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Agenda $agenda)
    {
        $artikel = Artikel::all(['id']);

        return view('pages.agenda.edit', [
            'model' => $agenda,
            "artikel" => $artikel,

        ]);
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->fill($request->all());

        if ($agenda->save()) {

            session()->flash('app_message', 'Agenda successfully updated');
            return redirect()->route('agenda.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Agenda');
        }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Agenda  $agenda
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Agenda $agenda)
    {
        if ($agenda->delete()) {
            session()->flash('app_message', 'Agenda successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Agenda');
        }

        return redirect()->back();
    }
}
