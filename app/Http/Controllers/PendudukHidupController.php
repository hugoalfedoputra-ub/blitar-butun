<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendudukHidupModel;


/**
 * Description of PendudukHidupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PendudukHidupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.penduduk_hidup.index', ['records' => PendudukHidupModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PendudukHidupModel  $pendudukhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PendudukHidupModel $pendudukhidupmodel)
    {
        return view('pages.penduduk_hidup.show', [
                'record' =>$pendudukhidupmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.penduduk_hidup.create', [
            'model' => new PendudukHidupModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PendudukHidupModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PendudukHidupModel saved successfully');
            return redirect()->route('penduduk_hidup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PendudukHidupModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PendudukHidupModel  $pendudukhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PendudukHidupModel $pendudukhidupmodel)
    {

        return view('pages.penduduk_hidup.edit', [
            'model' => $pendudukhidupmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PendudukHidupModel  $pendudukhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PendudukHidupModel $pendudukhidupmodel)
    {
        $pendudukhidupmodel->fill($request->all());

        if ($pendudukhidupmodel->save()) {
            
            session()->flash('app_message', 'PendudukHidupModel successfully updated');
            return redirect()->route('penduduk_hidup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PendudukHidupModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PendudukHidupModel  $pendudukhidupmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PendudukHidupModel $pendudukhidupmodel)
    {
        if ($pendudukhidupmodel->delete()) {
                session()->flash('app_message', 'PendudukHidupModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PendudukHidupModel');
            }

        return redirect()->back();
    }
}
