<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaSosialModel;


/**
 * Description of MediaSosialController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MediaSosialController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.media_sosial.index', ['records' => MediaSosialModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MediaSosialModel  $mediasosialmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MediaSosialModel $mediasosialmodel)
    {
        return view('pages.media_sosial.show', [
                'record' =>$mediasosialmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.media_sosial.create', [
            'model' => new MediaSosialModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MediaSosialModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MediaSosialModel saved successfully');
            return redirect()->route('media_sosial.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MediaSosialModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MediaSosialModel  $mediasosialmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MediaSosialModel $mediasosialmodel)
    {

        return view('pages.media_sosial.edit', [
            'model' => $mediasosialmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MediaSosialModel  $mediasosialmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MediaSosialModel $mediasosialmodel)
    {
        $mediasosialmodel->fill($request->all());

        if ($mediasosialmodel->save()) {
            
            session()->flash('app_message', 'MediaSosialModel successfully updated');
            return redirect()->route('media_sosial.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MediaSosialModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MediaSosialModel  $mediasosialmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MediaSosialModel $mediasosialmodel)
    {
        if ($mediasosialmodel->delete()) {
                session()->flash('app_message', 'MediaSosialModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MediaSosialModel');
            }

        return redirect()->back();
    }
}
