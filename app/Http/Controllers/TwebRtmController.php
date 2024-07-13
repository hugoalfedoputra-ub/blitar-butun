<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebRtm;


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
        return view('pages.tweb_rtm.index', ['records' => TwebRtm::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtm  $twebrtm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebRtm $twebrtm)
    {
        return view('pages.tweb_rtm.show', [
                'record' =>$twebrtm,
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
            'model' => new TwebRtm,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebRtm;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebRtm saved successfully');
            return redirect()->route('tweb_rtm.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebRtm');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtm  $twebrtm
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebRtm $twebrtm)
    {

        return view('pages.tweb_rtm.edit', [
            'model' => $twebrtm,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebRtm  $twebrtm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebRtm $twebrtm)
    {
        $twebrtm->fill($request->all());

        if ($twebrtm->save()) {
            
            session()->flash('app_message', 'TwebRtm successfully updated');
            return redirect()->route('tweb_rtm.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebRtm');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebRtm  $twebrtm
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebRtm $twebrtm)
    {
        if ($twebrtm->delete()) {
                session()->flash('app_message', 'TwebRtm successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebRtm');
            }

        return redirect()->back();
    }
}
