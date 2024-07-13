<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembangunanModel;


/**
 * Description of PembangunanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PembangunanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pembangunan.index', ['records' => PembangunanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanModel  $pembangunanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PembangunanModel $pembangunanmodel)
    {
        return view('pages.pembangunan.show', [
                'record' =>$pembangunanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pembangunan.create', [
            'model' => new PembangunanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PembangunanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PembangunanModel saved successfully');
            return redirect()->route('pembangunan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PembangunanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanModel  $pembangunanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PembangunanModel $pembangunanmodel)
    {

        return view('pages.pembangunan.edit', [
            'model' => $pembangunanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PembangunanModel  $pembangunanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PembangunanModel $pembangunanmodel)
    {
        $pembangunanmodel->fill($request->all());

        if ($pembangunanmodel->save()) {
            
            session()->flash('app_message', 'PembangunanModel successfully updated');
            return redirect()->route('pembangunan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PembangunanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PembangunanModel  $pembangunanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PembangunanModel $pembangunanmodel)
    {
        if ($pembangunanmodel->delete()) {
                session()->flash('app_message', 'PembangunanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PembangunanModel');
            }

        return redirect()->back();
    }
}
