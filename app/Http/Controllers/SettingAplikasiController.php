<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingAplikasi;


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
        return SettingAplikasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SettingAplikasi  $settingaplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $settingaplikasi = SettingAplikasi::find($id);
        if ($settingaplikasi) {
            return response()->json($settingaplikasi);
        }
        return response()->json(['message' => 'SettingAplikasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.setting_aplikasi.create', [
            'model' => new SettingAplikasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SettingAplikasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SettingAplikasi saved successfully');
            return redirect()->route('setting_aplikasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SettingAplikasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SettingAplikasi  $settingaplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SettingAplikasi $settingaplikasi)
    {

        return view('pages.setting_aplikasi.edit', [
            'model' => $settingaplikasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SettingAplikasi  $settingaplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SettingAplikasi $settingaplikasi)
    {
        $settingaplikasi->fill($request->all());

        if ($settingaplikasi->save()) {
            
            session()->flash('app_message', 'SettingAplikasi successfully updated');
            return redirect()->route('setting_aplikasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SettingAplikasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SettingAplikasi  $settingaplikasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SettingAplikasi $settingaplikasi)
    {
        if ($settingaplikasi->delete()) {
                session()->flash('app_message', 'SettingAplikasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SettingAplikasi');
            }

        return redirect()->back();
    }
}
