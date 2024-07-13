<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebRtmHubungan;


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
        return TwebRtmHubungan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmHubungan  $twebrtmhubungan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebRtmHubungan $twebrtmhubungan)
    {
        return view('pages.tweb_rtm_hubungan.show', [
                'record' =>$twebrtmhubungan,
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
            'model' => new TwebRtmHubungan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebRtmHubungan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebRtmHubungan saved successfully');
            return redirect()->route('tweb_rtm_hubungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebRtmHubungan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebRtmHubungan  $twebrtmhubungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebRtmHubungan $twebrtmhubungan)
    {

        return view('pages.tweb_rtm_hubungan.edit', [
            'model' => $twebrtmhubungan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebRtmHubungan  $twebrtmhubungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebRtmHubungan $twebrtmhubungan)
    {
        $twebrtmhubungan->fill($request->all());

        if ($twebrtmhubungan->save()) {
            
            session()->flash('app_message', 'TwebRtmHubungan successfully updated');
            return redirect()->route('tweb_rtm_hubungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebRtmHubungan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebRtmHubungan  $twebrtmhubungan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebRtmHubungan $twebrtmhubungan)
    {
        if ($twebrtmhubungan->delete()) {
                session()->flash('app_message', 'TwebRtmHubungan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebRtmHubungan');
            }

        return redirect()->back();
    }
}
