<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SysTraffic;


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
        return SysTraffic::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SysTraffic  $systraffic
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SysTraffic $systraffic)
    {
        return view('pages.sys_traffic.show', [
                'record' =>$systraffic,
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
            'model' => new SysTraffic,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SysTraffic;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SysTraffic saved successfully');
            return redirect()->route('sys_traffic.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SysTraffic');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SysTraffic  $systraffic
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SysTraffic $systraffic)
    {

        return view('pages.sys_traffic.edit', [
            'model' => $systraffic,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SysTraffic  $systraffic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SysTraffic $systraffic)
    {
        $systraffic->fill($request->all());

        if ($systraffic->save()) {
            
            session()->flash('app_message', 'SysTraffic successfully updated');
            return redirect()->route('sys_traffic.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SysTraffic');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SysTraffic  $systraffic
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SysTraffic $systraffic)
    {
        if ($systraffic->delete()) {
                session()->flash('app_message', 'SysTraffic successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SysTraffic');
            }

        return redirect()->back();
    }
}
