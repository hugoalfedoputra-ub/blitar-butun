<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebRtmModel;


/**
 * Description of TwebRtmController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebRtmController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_rtm.index', ['records' => TwebRtmModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmModel  $twebrtmmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebRtmModel $twebrtmmodel)
    {
        return view('pages.tweb_rtm.show', [
                'record' =>$twebrtmmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_rtm.create', [
            'model' => new TwebRtmModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebRtmModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebRtmModel saved successfully');
            return redirect()->route('tweb_rtm.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebRtmModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmModel  $twebrtmmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebRtmModel $twebrtmmodel)
    {

        return view('pages.tweb_rtm.edit', [
            'model' => $twebrtmmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebRtmModel  $twebrtmmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebRtmModel $twebrtmmodel)
    {
        $twebrtmmodel->fill($request->all());

        if ($twebrtmmodel->save()) {
            
            session()->flash('app_message', 'TwebRtmModel successfully updated');
            return redirect()->route('tweb_rtm.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebRtmModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebRtmModel  $twebrtmmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebRtmModel $twebrtmmodel)
    {
        if ($twebrtmmodel->delete()) {
                session()->flash('app_message', 'TwebRtmModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebRtmModel');
            }

        return redirect()->back();
    }
}
