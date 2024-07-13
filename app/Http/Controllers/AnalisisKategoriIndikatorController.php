<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisKategoriIndikatorModel;


/**
 * Description of AnalisisKategoriIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisKategoriIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_kategori_indikator.index', ['records' => AnalisisKategoriIndikatorModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikatorModel  $analisiskategoriindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisKategoriIndikatorModel $analisiskategoriindikatormodel)
    {
        return view('pages.analisis_kategori_indikator.show', [
                'record' =>$analisiskategoriindikatormodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_kategori_indikator.create', [
            'model' => new AnalisisKategoriIndikatorModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisKategoriIndikatorModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisKategoriIndikatorModel saved successfully');
            return redirect()->route('analisis_kategori_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisKategoriIndikatorModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikatorModel  $analisiskategoriindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisKategoriIndikatorModel $analisiskategoriindikatormodel)
    {

        return view('pages.analisis_kategori_indikator.edit', [
            'model' => $analisiskategoriindikatormodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikatorModel  $analisiskategoriindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisKategoriIndikatorModel $analisiskategoriindikatormodel)
    {
        $analisiskategoriindikatormodel->fill($request->all());

        if ($analisiskategoriindikatormodel->save()) {
            
            session()->flash('app_message', 'AnalisisKategoriIndikatorModel successfully updated');
            return redirect()->route('analisis_kategori_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisKategoriIndikatorModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikatorModel  $analisiskategoriindikatormodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisKategoriIndikatorModel $analisiskategoriindikatormodel)
    {
        if ($analisiskategoriindikatormodel->delete()) {
                session()->flash('app_message', 'AnalisisKategoriIndikatorModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisKategoriIndikatorModel');
            }

        return redirect()->back();
    }
}
