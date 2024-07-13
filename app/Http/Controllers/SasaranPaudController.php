<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SasaranPaudModel;


/**
 * Description of SasaranPaudController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SasaranPaudController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.sasaran_paud.index', ['records' => SasaranPaudModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SasaranPaudModel  $sasaranpaudmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SasaranPaudModel $sasaranpaudmodel)
    {
        return view('pages.sasaran_paud.show', [
                'record' =>$sasaranpaudmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.sasaran_paud.create', [
            'model' => new SasaranPaudModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SasaranPaudModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SasaranPaudModel saved successfully');
            return redirect()->route('sasaran_paud.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SasaranPaudModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SasaranPaudModel  $sasaranpaudmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SasaranPaudModel $sasaranpaudmodel)
    {

        return view('pages.sasaran_paud.edit', [
            'model' => $sasaranpaudmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SasaranPaudModel  $sasaranpaudmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SasaranPaudModel $sasaranpaudmodel)
    {
        $sasaranpaudmodel->fill($request->all());

        if ($sasaranpaudmodel->save()) {
            
            session()->flash('app_message', 'SasaranPaudModel successfully updated');
            return redirect()->route('sasaran_paud.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SasaranPaudModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SasaranPaudModel  $sasaranpaudmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SasaranPaudModel $sasaranpaudmodel)
    {
        if ($sasaranpaudmodel->delete()) {
                session()->flash('app_message', 'SasaranPaudModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SasaranPaudModel');
            }

        return redirect()->back();
    }
}
