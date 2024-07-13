<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GarisModel;


/**
 * Description of GarisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class GarisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.garis.index', ['records' => GarisModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  GarisModel  $garismodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, GarisModel $garismodel)
    {
        return view('pages.garis.show', [
                'record' =>$garismodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.garis.create', [
            'model' => new GarisModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new GarisModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'GarisModel saved successfully');
            return redirect()->route('garis.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving GarisModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  GarisModel  $garismodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, GarisModel $garismodel)
    {

        return view('pages.garis.edit', [
            'model' => $garismodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  GarisModel  $garismodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,GarisModel $garismodel)
    {
        $garismodel->fill($request->all());

        if ($garismodel->save()) {
            
            session()->flash('app_message', 'GarisModel successfully updated');
            return redirect()->route('garis.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating GarisModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  GarisModel  $garismodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, GarisModel $garismodel)
    {
        if ($garismodel->delete()) {
                session()->flash('app_message', 'GarisModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting GarisModel');
            }

        return redirect()->back();
    }
}
