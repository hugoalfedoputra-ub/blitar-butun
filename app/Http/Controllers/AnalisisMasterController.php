<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisMaster;


/**
 * Description of AnalisisMasterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisMasterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisMaster::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisMaster  $analisismaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisMaster $analisismaster)
    {
        return view('pages.analisis_master.show', [
                'record' =>$analisismaster,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_master.create', [
            'model' => new AnalisisMaster,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisMaster;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisMaster saved successfully');
            return redirect()->route('analisis_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisMaster');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisMaster  $analisismaster
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisMaster $analisismaster)
    {

        return view('pages.analisis_master.edit', [
            'model' => $analisismaster,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisMaster  $analisismaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisMaster $analisismaster)
    {
        $analisismaster->fill($request->all());

        if ($analisismaster->save()) {
            
            session()->flash('app_message', 'AnalisisMaster successfully updated');
            return redirect()->route('analisis_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisMaster');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisMaster  $analisismaster
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisMaster $analisismaster)
    {
        if ($analisismaster->delete()) {
                session()->flash('app_message', 'AnalisisMaster successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisMaster');
            }

        return redirect()->back();
    }
}
