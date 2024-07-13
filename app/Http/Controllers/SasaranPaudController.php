<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SasaranPaud;


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
        return view('pages.sasaran_paud.index', ['records' => SasaranPaud::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SasaranPaud  $sasaranpaud
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SasaranPaud $sasaranpaud)
    {
        return view('pages.sasaran_paud.show', [
                'record' =>$sasaranpaud,
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
            'model' => new SasaranPaud,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SasaranPaud;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SasaranPaud saved successfully');
            return redirect()->route('sasaran_paud.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SasaranPaud');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SasaranPaud  $sasaranpaud
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SasaranPaud $sasaranpaud)
    {

        return view('pages.sasaran_paud.edit', [
            'model' => $sasaranpaud,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SasaranPaud  $sasaranpaud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SasaranPaud $sasaranpaud)
    {
        $sasaranpaud->fill($request->all());

        if ($sasaranpaud->save()) {
            
            session()->flash('app_message', 'SasaranPaud successfully updated');
            return redirect()->route('sasaran_paud.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SasaranPaud');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SasaranPaud  $sasaranpaud
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SasaranPaud $sasaranpaud)
    {
        if ($sasaranpaud->delete()) {
                session()->flash('app_message', 'SasaranPaud successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SasaranPaud');
            }

        return redirect()->back();
    }
}
