<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebCacat;


/**
 * Description of TwebCacatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebCacatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebCacat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCacat  $twebcacat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebCacat $twebcacat)
    {
        return view('pages.tweb_cacat.show', [
                'record' =>$twebcacat,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_cacat.create', [
            'model' => new TwebCacat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebCacat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebCacat saved successfully');
            return redirect()->route('tweb_cacat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebCacat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCacat  $twebcacat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebCacat $twebcacat)
    {

        return view('pages.tweb_cacat.edit', [
            'model' => $twebcacat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebCacat  $twebcacat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebCacat $twebcacat)
    {
        $twebcacat->fill($request->all());

        if ($twebcacat->save()) {
            
            session()->flash('app_message', 'TwebCacat successfully updated');
            return redirect()->route('tweb_cacat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebCacat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebCacat  $twebcacat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebCacat $twebcacat)
    {
        if ($twebcacat->delete()) {
                session()->flash('app_message', 'TwebCacat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebCacat');
            }

        return redirect()->back();
    }
}
