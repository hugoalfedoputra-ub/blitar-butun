<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermohonanSuratModel;


/**
 * Description of PermohonanSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PermohonanSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.permohonan_surat.index', ['records' => PermohonanSuratModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PermohonanSuratModel  $permohonansuratmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PermohonanSuratModel $permohonansuratmodel)
    {
        return view('pages.permohonan_surat.show', [
                'record' =>$permohonansuratmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.permohonan_surat.create', [
            'model' => new PermohonanSuratModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PermohonanSuratModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PermohonanSuratModel saved successfully');
            return redirect()->route('permohonan_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PermohonanSuratModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PermohonanSuratModel  $permohonansuratmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PermohonanSuratModel $permohonansuratmodel)
    {

        return view('pages.permohonan_surat.edit', [
            'model' => $permohonansuratmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PermohonanSuratModel  $permohonansuratmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PermohonanSuratModel $permohonansuratmodel)
    {
        $permohonansuratmodel->fill($request->all());

        if ($permohonansuratmodel->save()) {
            
            session()->flash('app_message', 'PermohonanSuratModel successfully updated');
            return redirect()->route('permohonan_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PermohonanSuratModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PermohonanSuratModel  $permohonansuratmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PermohonanSuratModel $permohonansuratmodel)
    {
        if ($permohonansuratmodel->delete()) {
                session()->flash('app_message', 'PermohonanSuratModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PermohonanSuratModel');
            }

        return redirect()->back();
    }
}
