<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfigSID;


/**
 * Description of ConfigController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ConfigSIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ConfigSID::paginate(10);
    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  ConfigSID  $configsid
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ConfigSID $configsid)
    {
        return view('pages.config.show', [
            'record' => $configsid,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.config.create', [
            'model' => new ConfigSID,

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new ConfigSID;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'ConfigSID saved successfully');
            return redirect()->route('config.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving ConfigSID');
        }
        return redirect()->back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  ConfigSID  $configsid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ConfigSID $configsid)
    {

        return view('pages.config.edit', [
            'model' => $configsid,

        ]);
    }
    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  ConfigSID  $configsid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigSID $configsid)
    {
        $configsid->fill($request->all());

        if ($configsid->save()) {

            session()->flash('app_message', 'ConfigSID successfully updated');
            return redirect()->route('config.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating ConfigSID');
        }
        return redirect()->back();
    }
    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  ConfigSID  $configsid
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, ConfigSID $configsid)
    {
        if ($configsid->delete()) {
            session()->flash('app_message', 'ConfigSID successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting ConfigSID');
        }

        return redirect()->back();
    }
}
