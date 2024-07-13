<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenModel;


/**
 * Description of DokumenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DokumenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dokumen.index', ['records' => DokumenModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenModel  $dokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DokumenModel $dokumenmodel)
    {
        return view('pages.dokumen.show', [
                'record' =>$dokumenmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.dokumen.create', [
            'model' => new DokumenModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DokumenModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DokumenModel saved successfully');
            return redirect()->route('dokumen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DokumenModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenModel  $dokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DokumenModel $dokumenmodel)
    {

        return view('pages.dokumen.edit', [
            'model' => $dokumenmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DokumenModel  $dokumenmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DokumenModel $dokumenmodel)
    {
        $dokumenmodel->fill($request->all());

        if ($dokumenmodel->save()) {
            
            session()->flash('app_message', 'DokumenModel successfully updated');
            return redirect()->route('dokumen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DokumenModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DokumenModel  $dokumenmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DokumenModel $dokumenmodel)
    {
        if ($dokumenmodel->delete()) {
                session()->flash('app_message', 'DokumenModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DokumenModel');
            }

        return redirect()->back();
    }
}
