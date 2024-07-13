<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebRtmHubunganModel;


/**
 * Description of TwebRtmHubunganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebRtmHubunganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_rtm_hubungan.index', ['records' => TwebRtmHubunganModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmHubunganModel  $twebrtmhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebRtmHubunganModel $twebrtmhubunganmodel)
    {
        return view('pages.tweb_rtm_hubungan.show', [
                'record' =>$twebrtmhubunganmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_rtm_hubungan.create', [
            'model' => new TwebRtmHubunganModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebRtmHubunganModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebRtmHubunganModel saved successfully');
            return redirect()->route('tweb_rtm_hubungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebRtmHubunganModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmHubunganModel  $twebrtmhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebRtmHubunganModel $twebrtmhubunganmodel)
    {

        return view('pages.tweb_rtm_hubungan.edit', [
            'model' => $twebrtmhubunganmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebRtmHubunganModel  $twebrtmhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebRtmHubunganModel $twebrtmhubunganmodel)
    {
        $twebrtmhubunganmodel->fill($request->all());

        if ($twebrtmhubunganmodel->save()) {
            
            session()->flash('app_message', 'TwebRtmHubunganModel successfully updated');
            return redirect()->route('tweb_rtm_hubungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebRtmHubunganModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebRtmHubunganModel  $twebrtmhubunganmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebRtmHubunganModel $twebrtmhubunganmodel)
    {
        if ($twebrtmhubunganmodel->delete()) {
                session()->flash('app_message', 'TwebRtmHubunganModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebRtmHubunganModel');
            }

        return redirect()->back();
    }
}
