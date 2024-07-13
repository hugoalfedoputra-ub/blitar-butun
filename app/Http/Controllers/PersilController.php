<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersilModel;


/**
 * Description of PersilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PersilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.persil.index', ['records' => PersilModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PersilModel  $persilmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PersilModel $persilmodel)
    {
        return view('pages.persil.show', [
                'record' =>$persilmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.persil.create', [
            'model' => new PersilModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PersilModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PersilModel saved successfully');
            return redirect()->route('persil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PersilModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PersilModel  $persilmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PersilModel $persilmodel)
    {

        return view('pages.persil.edit', [
            'model' => $persilmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PersilModel  $persilmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PersilModel $persilmodel)
    {
        $persilmodel->fill($request->all());

        if ($persilmodel->save()) {
            
            session()->flash('app_message', 'PersilModel successfully updated');
            return redirect()->route('persil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PersilModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PersilModel  $persilmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PersilModel $persilmodel)
    {
        if ($persilmodel->delete()) {
                session()->flash('app_message', 'PersilModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PersilModel');
            }

        return redirect()->back();
    }
}
