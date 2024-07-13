<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingAplikasiModel;


/**
 * Description of SettingAplikasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SettingAplikasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.setting_aplikasi.index', ['records' => SettingAplikasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SettingAplikasiModel  $settingaplikasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SettingAplikasiModel $settingaplikasimodel)
    {
        return view('pages.setting_aplikasi.show', [
                'record' =>$settingaplikasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.setting_aplikasi.create', [
            'model' => new SettingAplikasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SettingAplikasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SettingAplikasiModel saved successfully');
            return redirect()->route('setting_aplikasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SettingAplikasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SettingAplikasiModel  $settingaplikasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SettingAplikasiModel $settingaplikasimodel)
    {

        return view('pages.setting_aplikasi.edit', [
            'model' => $settingaplikasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SettingAplikasiModel  $settingaplikasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SettingAplikasiModel $settingaplikasimodel)
    {
        $settingaplikasimodel->fill($request->all());

        if ($settingaplikasimodel->save()) {
            
            session()->flash('app_message', 'SettingAplikasiModel successfully updated');
            return redirect()->route('setting_aplikasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SettingAplikasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SettingAplikasiModel  $settingaplikasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SettingAplikasiModel $settingaplikasimodel)
    {
        if ($settingaplikasimodel->delete()) {
                session()->flash('app_message', 'SettingAplikasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SettingAplikasiModel');
            }

        return redirect()->back();
    }
}
