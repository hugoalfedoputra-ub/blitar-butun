<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisTipeIndikatorModel;


/**
 * Description of AnalisisTipeIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisTipeIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_tipe_indikator.index', ['records' => AnalisisTipeIndikatorModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikatorModel  $analisistipeindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisTipeIndikatorModel $analisistipeindikatormodel)
    {
        return view('pages.analisis_tipe_indikator.show', [
                'record' =>$analisistipeindikatormodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_tipe_indikator.create', [
            'model' => new AnalisisTipeIndikatorModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisTipeIndikatorModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisTipeIndikatorModel saved successfully');
            return redirect()->route('analisis_tipe_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisTipeIndikatorModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikatorModel  $analisistipeindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisTipeIndikatorModel $analisistipeindikatormodel)
    {

        return view('pages.analisis_tipe_indikator.edit', [
            'model' => $analisistipeindikatormodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikatorModel  $analisistipeindikatormodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisTipeIndikatorModel $analisistipeindikatormodel)
    {
        $analisistipeindikatormodel->fill($request->all());

        if ($analisistipeindikatormodel->save()) {
            
            session()->flash('app_message', 'AnalisisTipeIndikatorModel successfully updated');
            return redirect()->route('analisis_tipe_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisTipeIndikatorModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisTipeIndikatorModel  $analisistipeindikatormodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisTipeIndikatorModel $analisistipeindikatormodel)
    {
        if ($analisistipeindikatormodel->delete()) {
                session()->flash('app_message', 'AnalisisTipeIndikatorModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisTipeIndikatorModel');
            }

        return redirect()->back();
    }
}
