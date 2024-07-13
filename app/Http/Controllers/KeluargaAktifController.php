<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeluargaAktifModel;


/**
 * Description of KeluargaAktifController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeluargaAktifController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keluarga_aktif.index', ['records' => KeluargaAktifModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeluargaAktifModel  $keluargaaktifmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeluargaAktifModel $keluargaaktifmodel)
    {
        return view('pages.keluarga_aktif.show', [
                'record' =>$keluargaaktifmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keluarga_aktif.create', [
            'model' => new KeluargaAktifModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeluargaAktifModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeluargaAktifModel saved successfully');
            return redirect()->route('keluarga_aktif.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeluargaAktifModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeluargaAktifModel  $keluargaaktifmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeluargaAktifModel $keluargaaktifmodel)
    {

        return view('pages.keluarga_aktif.edit', [
            'model' => $keluargaaktifmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeluargaAktifModel  $keluargaaktifmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeluargaAktifModel $keluargaaktifmodel)
    {
        $keluargaaktifmodel->fill($request->all());

        if ($keluargaaktifmodel->save()) {
            
            session()->flash('app_message', 'KeluargaAktifModel successfully updated');
            return redirect()->route('keluarga_aktif.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeluargaAktifModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeluargaAktifModel  $keluargaaktifmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeluargaAktifModel $keluargaaktifmodel)
    {
        if ($keluargaaktifmodel->delete()) {
                session()->flash('app_message', 'KeluargaAktifModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeluargaAktifModel');
            }

        return redirect()->back();
    }
}
