<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksLampiran;
use App\Models\TwebRtm;


/**
 * Description of DtksLampiranController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksLampiranController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DtksLampiran::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksLampiran  $dtkslampiran
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksLampiran $dtkslampiran)
    {
        return view('pages.dtks_lampiran.show', [
                'record' =>$dtkslampiran,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$tweb_rtm = TwebRtm::all(['id']);

        return view('pages.dtks_lampiran.create', [
            'model' => new DtksLampiran,
			"tweb_rtm" => $tweb_rtm,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksLampiran;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksLampiran saved successfully');
            return redirect()->route('dtks_lampiran.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksLampiran');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksLampiran  $dtkslampiran
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksLampiran $dtkslampiran)
    {
		$tweb_rtm = TwebRtm::all(['id']);

        return view('pages.dtks_lampiran.edit', [
            'model' => $dtkslampiran,
			"tweb_rtm" => $tweb_rtm,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksLampiran  $dtkslampiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksLampiran $dtkslampiran)
    {
        $dtkslampiran->fill($request->all());

        if ($dtkslampiran->save()) {
            
            session()->flash('app_message', 'DtksLampiran successfully updated');
            return redirect()->route('dtks_lampiran.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksLampiran');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksLampiran  $dtkslampiran
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksLampiran $dtkslampiran)
    {
        if ($dtkslampiran->delete()) {
                session()->flash('app_message', 'DtksLampiran successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksLampiran');
            }

        return redirect()->back();
    }
}
