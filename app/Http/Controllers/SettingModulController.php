<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingModulModel;


/**
 * Description of SettingModulController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SettingModulController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.setting_modul.index', ['records' => SettingModulModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SettingModulModel  $settingmodulmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SettingModulModel $settingmodulmodel)
    {
        return view('pages.setting_modul.show', [
                'record' =>$settingmodulmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.setting_modul.create', [
            'model' => new SettingModulModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SettingModulModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SettingModulModel saved successfully');
            return redirect()->route('setting_modul.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SettingModulModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SettingModulModel  $settingmodulmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SettingModulModel $settingmodulmodel)
    {

        return view('pages.setting_modul.edit', [
            'model' => $settingmodulmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SettingModulModel  $settingmodulmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SettingModulModel $settingmodulmodel)
    {
        $settingmodulmodel->fill($request->all());

        if ($settingmodulmodel->save()) {
            
            session()->flash('app_message', 'SettingModulModel successfully updated');
            return redirect()->route('setting_modul.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SettingModulModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SettingModulModel  $settingmodulmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SettingModulModel $settingmodulmodel)
    {
        if ($settingmodulmodel->delete()) {
                session()->flash('app_message', 'SettingModulModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SettingModulModel');
            }

        return redirect()->back();
    }
}
