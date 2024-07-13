<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebWilClusterdesaModel;


/**
 * Description of TwebWilClusterdesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebWilClusterdesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_wil_clusterdesa.index', ['records' => TwebWilClusterdesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesaModel  $twebwilclusterdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebWilClusterdesaModel $twebwilclusterdesamodel)
    {
        return view('pages.tweb_wil_clusterdesa.show', [
                'record' =>$twebwilclusterdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_wil_clusterdesa.create', [
            'model' => new TwebWilClusterdesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebWilClusterdesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebWilClusterdesaModel saved successfully');
            return redirect()->route('tweb_wil_clusterdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebWilClusterdesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesaModel  $twebwilclusterdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebWilClusterdesaModel $twebwilclusterdesamodel)
    {

        return view('pages.tweb_wil_clusterdesa.edit', [
            'model' => $twebwilclusterdesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesaModel  $twebwilclusterdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebWilClusterdesaModel $twebwilclusterdesamodel)
    {
        $twebwilclusterdesamodel->fill($request->all());

        if ($twebwilclusterdesamodel->save()) {
            
            session()->flash('app_message', 'TwebWilClusterdesaModel successfully updated');
            return redirect()->route('tweb_wil_clusterdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebWilClusterdesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesaModel  $twebwilclusterdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebWilClusterdesaModel $twebwilclusterdesamodel)
    {
        if ($twebwilclusterdesamodel->delete()) {
                session()->flash('app_message', 'TwebWilClusterdesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebWilClusterdesaModel');
            }

        return redirect()->back();
    }
}
