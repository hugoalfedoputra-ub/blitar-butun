<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GisSimbolModel;


/**
 * Description of GisSimbolController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class GisSimbolController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.gis_simbol.index', ['records' => GisSimbolModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GisSimbolModel  $gissimbolmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GisSimbolModel $gissimbolmodel)
    {
        return view('pages.gis_simbol.show', [
                'record' =>$gissimbolmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.gis_simbol.create', [
            'model' => new GisSimbolModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GisSimbolModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GisSimbolModel saved successfully');
            return redirect()->route('gis_simbol.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GisSimbolModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GisSimbolModel  $gissimbolmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GisSimbolModel $gissimbolmodel)
    {

        return view('pages.gis_simbol.edit', [
            'model' => $gissimbolmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GisSimbolModel  $gissimbolmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GisSimbolModel $gissimbolmodel)
    {
        $gissimbolmodel->fill($request->all());

        if ($gissimbolmodel->save()) {
            
            session()->flash('app_message', 'GisSimbolModel successfully updated');
            return redirect()->route('gis_simbol.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GisSimbolModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GisSimbolModel  $gissimbolmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GisSimbolModel $gissimbolmodel)
    {
        if ($gissimbolmodel->delete()) {
                session()->flash('app_message', 'GisSimbolModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GisSimbolModel');
            }

        return redirect()->back();
    }
}
