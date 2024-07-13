<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebCacatModel;


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
        return view('pages.tweb_cacat.index', ['records' => TwebCacatModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCacatModel  $twebcacatmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebCacatModel $twebcacatmodel)
    {
        return view('pages.tweb_cacat.show', [
                'record' =>$twebcacatmodel,
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
            'model' => new TwebCacatModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebCacatModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebCacatModel saved successfully');
            return redirect()->route('tweb_cacat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebCacatModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCacatModel  $twebcacatmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebCacatModel $twebcacatmodel)
    {

        return view('pages.tweb_cacat.edit', [
            'model' => $twebcacatmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebCacatModel  $twebcacatmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebCacatModel $twebcacatmodel)
    {
        $twebcacatmodel->fill($request->all());

        if ($twebcacatmodel->save()) {
            
            session()->flash('app_message', 'TwebCacatModel successfully updated');
            return redirect()->route('tweb_cacat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebCacatModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebCacatModel  $twebcacatmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebCacatModel $twebcacatmodel)
    {
        if ($twebcacatmodel->delete()) {
                session()->flash('app_message', 'TwebCacatModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebCacatModel');
            }

        return redirect()->back();
    }
}
