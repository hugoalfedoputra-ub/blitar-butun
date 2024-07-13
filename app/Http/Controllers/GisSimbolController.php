<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GisSimbol;


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
        return view('pages.gis_simbol.index', ['records' => GisSimbol::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GisSimbol  $gissimbol
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GisSimbol $gissimbol)
    {
        return view('pages.gis_simbol.show', [
                'record' =>$gissimbol,
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
            'model' => new GisSimbol,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GisSimbol;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GisSimbol saved successfully');
            return redirect()->route('gis_simbol.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GisSimbol');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GisSimbol  $gissimbol
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GisSimbol $gissimbol)
    {

        return view('pages.gis_simbol.edit', [
            'model' => $gissimbol,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GisSimbol  $gissimbol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GisSimbol $gissimbol)
    {
        $gissimbol->fill($request->all());

        if ($gissimbol->save()) {
            
            session()->flash('app_message', 'GisSimbol successfully updated');
            return redirect()->route('gis_simbol.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GisSimbol');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GisSimbol  $gissimbol
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GisSimbol $gissimbol)
    {
        if ($gissimbol->delete()) {
                session()->flash('app_message', 'GisSimbol successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GisSimbol');
            }

        return redirect()->back();
    }
}
