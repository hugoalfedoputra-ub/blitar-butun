<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisResponBukti;


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
        return view('pages.analisis_respon_bukti.index', ['records' => AnalisisResponBukti::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponBukti  $analisisresponbukti
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisResponBukti $analisisresponbukti)
    {
        return view('pages.analisis_respon_bukti.show', [
                'record' =>$analisisresponbukti,
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
            'model' => new AnalisisResponBukti,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisResponBukti;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisResponBukti saved successfully');
            return redirect()->route('analisis_respon_bukti.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisResponBukti');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponBukti  $analisisresponbukti
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisResponBukti $analisisresponbukti)
    {

        return view('pages.analisis_respon_bukti.edit', [
            'model' => $analisisresponbukti,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponBukti  $analisisresponbukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisResponBukti $analisisresponbukti)
    {
        $analisisresponbukti->fill($request->all());

        if ($analisisresponbukti->save()) {
            
            session()->flash('app_message', 'AnalisisResponBukti successfully updated');
            return redirect()->route('analisis_respon_bukti.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisResponBukti');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponBukti  $analisisresponbukti
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisResponBukti $analisisresponbukti)
    {
        if ($analisisresponbukti->delete()) {
                session()->flash('app_message', 'AnalisisResponBukti successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisResponBukti');
            }

        return redirect()->back();
    }
}
