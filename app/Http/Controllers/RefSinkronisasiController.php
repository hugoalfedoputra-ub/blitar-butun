<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefSinkronisasiModel;


/**
 * Description of RefSinkronisasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefSinkronisasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_sinkronisasi.index', ['records' => RefSinkronisasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefSinkronisasiModel  $refsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefSinkronisasiModel $refsinkronisasimodel)
    {
        return view('pages.ref_sinkronisasi.show', [
                'record' =>$refsinkronisasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_sinkronisasi.create', [
            'model' => new RefSinkronisasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefSinkronisasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefSinkronisasiModel saved successfully');
            return redirect()->route('ref_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefSinkronisasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefSinkronisasiModel  $refsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefSinkronisasiModel $refsinkronisasimodel)
    {

        return view('pages.ref_sinkronisasi.edit', [
            'model' => $refsinkronisasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefSinkronisasiModel  $refsinkronisasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefSinkronisasiModel $refsinkronisasimodel)
    {
        $refsinkronisasimodel->fill($request->all());

        if ($refsinkronisasimodel->save()) {
            
            session()->flash('app_message', 'RefSinkronisasiModel successfully updated');
            return redirect()->route('ref_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefSinkronisasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefSinkronisasiModel  $refsinkronisasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefSinkronisasiModel $refsinkronisasimodel)
    {
        if ($refsinkronisasimodel->delete()) {
                session()->flash('app_message', 'RefSinkronisasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefSinkronisasiModel');
            }

        return redirect()->back();
    }
}
