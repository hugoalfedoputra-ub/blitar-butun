<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebWilClusterdesa;


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
        return TwebWilClusterdesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesa  $twebwilclusterdesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebWilClusterdesa $twebwilclusterdesa)
    {
        return view('pages.tweb_wil_clusterdesa.show', [
                'record' =>$twebwilclusterdesa,
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
            'model' => new TwebWilClusterdesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebWilClusterdesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebWilClusterdesa saved successfully');
            return redirect()->route('tweb_wil_clusterdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebWilClusterdesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesa  $twebwilclusterdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebWilClusterdesa $twebwilclusterdesa)
    {

        return view('pages.tweb_wil_clusterdesa.edit', [
            'model' => $twebwilclusterdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesa  $twebwilclusterdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebWilClusterdesa $twebwilclusterdesa)
    {
        $twebwilclusterdesa->fill($request->all());

        if ($twebwilclusterdesa->save()) {
            
            session()->flash('app_message', 'TwebWilClusterdesa successfully updated');
            return redirect()->route('tweb_wil_clusterdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebWilClusterdesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebWilClusterdesa  $twebwilclusterdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebWilClusterdesa $twebwilclusterdesa)
    {
        if ($twebwilclusterdesa->delete()) {
                session()->flash('app_message', 'TwebWilClusterdesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebWilClusterdesa');
            }

        return redirect()->back();
    }
}
