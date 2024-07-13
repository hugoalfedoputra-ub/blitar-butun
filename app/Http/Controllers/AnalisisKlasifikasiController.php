<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisKlasifikasiModel;


/**
 * Description of AnalisisKlasifikasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisKlasifikasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_klasifikasi.index', ['records' => AnalisisKlasifikasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasiModel  $analisisklasifikasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisKlasifikasiModel $analisisklasifikasimodel)
    {
        return view('pages.analisis_klasifikasi.show', [
                'record' =>$analisisklasifikasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_klasifikasi.create', [
            'model' => new AnalisisKlasifikasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisKlasifikasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisKlasifikasiModel saved successfully');
            return redirect()->route('analisis_klasifikasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisKlasifikasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasiModel  $analisisklasifikasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisKlasifikasiModel $analisisklasifikasimodel)
    {

        return view('pages.analisis_klasifikasi.edit', [
            'model' => $analisisklasifikasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasiModel  $analisisklasifikasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisKlasifikasiModel $analisisklasifikasimodel)
    {
        $analisisklasifikasimodel->fill($request->all());

        if ($analisisklasifikasimodel->save()) {
            
            session()->flash('app_message', 'AnalisisKlasifikasiModel successfully updated');
            return redirect()->route('analisis_klasifikasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisKlasifikasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasiModel  $analisisklasifikasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisKlasifikasiModel $analisisklasifikasimodel)
    {
        if ($analisisklasifikasimodel->delete()) {
                session()->flash('app_message', 'AnalisisKlasifikasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisKlasifikasiModel');
            }

        return redirect()->back();
    }
}
