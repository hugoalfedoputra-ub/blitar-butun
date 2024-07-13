<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisMasterModel;


/**
 * Description of AnalisisMasterController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisMasterController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_master.index', ['records' => AnalisisMasterModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisMasterModel  $analisismastermodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisMasterModel $analisismastermodel)
    {
        return view('pages.analisis_master.show', [
                'record' =>$analisismastermodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_master.create', [
            'model' => new AnalisisMasterModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisMasterModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisMasterModel saved successfully');
            return redirect()->route('analisis_master.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisMasterModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisMasterModel  $analisismastermodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisMasterModel $analisismastermodel)
    {

        return view('pages.analisis_master.edit', [
            'model' => $analisismastermodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisMasterModel  $analisismastermodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisMasterModel $analisismastermodel)
    {
        $analisismastermodel->fill($request->all());

        if ($analisismastermodel->save()) {
            
            session()->flash('app_message', 'AnalisisMasterModel successfully updated');
            return redirect()->route('analisis_master.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisMasterModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisMasterModel  $analisismastermodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisMasterModel $analisismastermodel)
    {
        if ($analisismastermodel->delete()) {
                session()->flash('app_message', 'AnalisisMasterModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisMasterModel');
            }

        return redirect()->back();
    }
}
