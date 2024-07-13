<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MediaSosial;


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
        return view('pages.media_sosial.index', ['records' => MediaSosial::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MediaSosial  $mediasosial
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MediaSosial $mediasosial)
    {
        return view('pages.media_sosial.show', [
                'record' =>$mediasosial,
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
            'model' => new MediaSosial,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MediaSosial;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MediaSosial saved successfully');
            return redirect()->route('media_sosial.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MediaSosial');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MediaSosial  $mediasosial
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MediaSosial $mediasosial)
    {

        return view('pages.media_sosial.edit', [
            'model' => $mediasosial,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MediaSosial  $mediasosial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MediaSosial $mediasosial)
    {
        $mediasosial->fill($request->all());

        if ($mediasosial->save()) {
            
            session()->flash('app_message', 'MediaSosial successfully updated');
            return redirect()->route('media_sosial.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MediaSosial');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MediaSosial  $mediasosial
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MediaSosial $mediasosial)
    {
        if ($mediasosial->delete()) {
                session()->flash('app_message', 'MediaSosial successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MediaSosial');
            }

        return redirect()->back();
    }
}
