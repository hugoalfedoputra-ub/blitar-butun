<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysTrafficModel;


/**
 * Description of SysTrafficController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SysTrafficController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.sys_traffic.index', ['records' => SysTrafficModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SysTrafficModel  $systrafficmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SysTrafficModel $systrafficmodel)
    {
        return view('pages.sys_traffic.show', [
                'record' =>$systrafficmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.sys_traffic.create', [
            'model' => new SysTrafficModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SysTrafficModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SysTrafficModel saved successfully');
            return redirect()->route('sys_traffic.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SysTrafficModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SysTrafficModel  $systrafficmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SysTrafficModel $systrafficmodel)
    {

        return view('pages.sys_traffic.edit', [
            'model' => $systrafficmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SysTrafficModel  $systrafficmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SysTrafficModel $systrafficmodel)
    {
        $systrafficmodel->fill($request->all());

        if ($systrafficmodel->save()) {
            
            session()->flash('app_message', 'SysTrafficModel successfully updated');
            return redirect()->route('sys_traffic.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SysTrafficModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SysTrafficModel  $systrafficmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SysTrafficModel $systrafficmodel)
    {
        if ($systrafficmodel->delete()) {
                session()->flash('app_message', 'SysTrafficModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SysTrafficModel');
            }

        return redirect()->back();
    }
}
