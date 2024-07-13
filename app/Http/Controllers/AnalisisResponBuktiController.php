<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisResponBuktiModel;


/**
 * Description of AnalisisResponBuktiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisResponBuktiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_respon_bukti.index', ['records' => AnalisisResponBuktiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponBuktiModel  $analisisresponbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisResponBuktiModel $analisisresponbuktimodel)
    {
        return view('pages.analisis_respon_bukti.show', [
                'record' =>$analisisresponbuktimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_respon_bukti.create', [
            'model' => new AnalisisResponBuktiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisResponBuktiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisResponBuktiModel saved successfully');
            return redirect()->route('analisis_respon_bukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisResponBuktiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponBuktiModel  $analisisresponbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisResponBuktiModel $analisisresponbuktimodel)
    {

        return view('pages.analisis_respon_bukti.edit', [
            'model' => $analisisresponbuktimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponBuktiModel  $analisisresponbuktimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisResponBuktiModel $analisisresponbuktimodel)
    {
        $analisisresponbuktimodel->fill($request->all());

        if ($analisisresponbuktimodel->save()) {
            
            session()->flash('app_message', 'AnalisisResponBuktiModel successfully updated');
            return redirect()->route('analisis_respon_bukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisResponBuktiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponBuktiModel  $analisisresponbuktimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisResponBuktiModel $analisisresponbuktimodel)
    {
        if ($analisisresponbuktimodel->delete()) {
                session()->flash('app_message', 'AnalisisResponBuktiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisResponBuktiModel');
            }

        return redirect()->back();
    }
}
