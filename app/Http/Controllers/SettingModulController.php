<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingModul;


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
        return view('pages.setting_modul.index', ['records' => SettingModul::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SettingModul  $settingmodul
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SettingModul $settingmodul)
    {
        return view('pages.setting_modul.show', [
                'record' =>$settingmodul,
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
            'model' => new SettingModul,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SettingModul;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SettingModul saved successfully');
            return redirect()->route('setting_modul.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SettingModul');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SettingModul  $settingmodul
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SettingModul $settingmodul)
    {

        return view('pages.setting_modul.edit', [
            'model' => $settingmodul,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SettingModul  $settingmodul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SettingModul $settingmodul)
    {
        $settingmodul->fill($request->all());

        if ($settingmodul->save()) {
            
            session()->flash('app_message', 'SettingModul successfully updated');
            return redirect()->route('setting_modul.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SettingModul');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SettingModul  $settingmodul
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SettingModul $settingmodul)
    {
        if ($settingmodul->delete()) {
                session()->flash('app_message', 'SettingModul successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SettingModul');
            }

        return redirect()->back();
    }
}
