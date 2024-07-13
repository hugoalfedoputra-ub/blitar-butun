<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenHidupModel;


/**
 * Description of DokumenHidupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DokumenHidupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dokumen_hidup.index', ['records' => DokumenHidupModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenHidupModel  $dokumenhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DokumenHidupModel $dokumenhidupmodel)
    {
        return view('pages.dokumen_hidup.show', [
                'record' =>$dokumenhidupmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.dokumen_hidup.create', [
            'model' => new DokumenHidupModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DokumenHidupModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DokumenHidupModel saved successfully');
            return redirect()->route('dokumen_hidup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DokumenHidupModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenHidupModel  $dokumenhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DokumenHidupModel $dokumenhidupmodel)
    {

        return view('pages.dokumen_hidup.edit', [
            'model' => $dokumenhidupmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DokumenHidupModel  $dokumenhidupmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DokumenHidupModel $dokumenhidupmodel)
    {
        $dokumenhidupmodel->fill($request->all());

        if ($dokumenhidupmodel->save()) {
            
            session()->flash('app_message', 'DokumenHidupModel successfully updated');
            return redirect()->route('dokumen_hidup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DokumenHidupModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DokumenHidupModel  $dokumenhidupmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DokumenHidupModel $dokumenhidupmodel)
    {
        if ($dokumenhidupmodel->delete()) {
                session()->flash('app_message', 'DokumenHidupModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DokumenHidupModel');
            }

        return redirect()->back();
    }
}
