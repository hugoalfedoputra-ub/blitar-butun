<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiCdesaModel;
use App\Models\Cdesa;


/**
 * Description of MutasiCdesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiCdesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_cdesa.index', ['records' => MutasiCdesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiCdesaModel  $mutasicdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiCdesaModel $mutasicdesamodel)
    {
        return view('pages.mutasi_cdesa.show', [
                'record' =>$mutasicdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.mutasi_cdesa.create', [
            'model' => new MutasiCdesaModel,
			"cdesa" => $cdesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiCdesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiCdesaModel saved successfully');
            return redirect()->route('mutasi_cdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiCdesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiCdesaModel  $mutasicdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiCdesaModel $mutasicdesamodel)
    {
		$cdesa = Cdesa::all(['id']);

        return view('pages.mutasi_cdesa.edit', [
            'model' => $mutasicdesamodel,
			"cdesa" => $cdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiCdesaModel  $mutasicdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiCdesaModel $mutasicdesamodel)
    {
        $mutasicdesamodel->fill($request->all());

        if ($mutasicdesamodel->save()) {
            
            session()->flash('app_message', 'MutasiCdesaModel successfully updated');
            return redirect()->route('mutasi_cdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiCdesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiCdesaModel  $mutasicdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiCdesaModel $mutasicdesamodel)
    {
        if ($mutasicdesamodel->delete()) {
                session()->flash('app_message', 'MutasiCdesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiCdesaModel');
            }

        return redirect()->back();
    }
}
