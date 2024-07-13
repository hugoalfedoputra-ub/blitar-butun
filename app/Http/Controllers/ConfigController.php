<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigModel;


/**
 * Description of ConfigController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ConfigController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.config.index', ['records' => ConfigModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ConfigModel  $configmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ConfigModel $configmodel)
    {
        return view('pages.config.show', [
                'record' =>$configmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.config.create', [
            'model' => new ConfigModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new ConfigModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ConfigModel saved successfully');
            return redirect()->route('config.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ConfigModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ConfigModel  $configmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ConfigModel $configmodel)
    {

        return view('pages.config.edit', [
            'model' => $configmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ConfigModel  $configmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ConfigModel $configmodel)
    {
        $configmodel->fill($request->all());

        if ($configmodel->save()) {
            
            session()->flash('app_message', 'ConfigModel successfully updated');
            return redirect()->route('config.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ConfigModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ConfigModel  $configmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ConfigModel $configmodel)
    {
        if ($configmodel->delete()) {
                session()->flash('app_message', 'ConfigModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ConfigModel');
            }

        return redirect()->back();
    }
}
