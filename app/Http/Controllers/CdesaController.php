<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CdesaModel;


/**
 * Description of CdesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class CdesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.cdesa.index', ['records' => CdesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaModel  $cdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CdesaModel $cdesamodel)
    {
        return view('pages.cdesa.show', [
                'record' =>$cdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.cdesa.create', [
            'model' => new CdesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new CdesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'CdesaModel saved successfully');
            return redirect()->route('cdesa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving CdesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  CdesaModel  $cdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CdesaModel $cdesamodel)
    {

        return view('pages.cdesa.edit', [
            'model' => $cdesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  CdesaModel  $cdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CdesaModel $cdesamodel)
    {
        $cdesamodel->fill($request->all());

        if ($cdesamodel->save()) {
            
            session()->flash('app_message', 'CdesaModel successfully updated');
            return redirect()->route('cdesa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating CdesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  CdesaModel  $cdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, CdesaModel $cdesamodel)
    {
        if ($cdesamodel->delete()) {
                session()->flash('app_message', 'CdesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting CdesaModel');
            }

        return redirect()->back();
    }
}
