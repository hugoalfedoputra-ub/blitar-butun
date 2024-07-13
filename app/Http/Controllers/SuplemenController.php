<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuplemenModel;


/**
 * Description of SuplemenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuplemenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.suplemen.index', ['records' => SuplemenModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenModel  $suplemenmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SuplemenModel $suplemenmodel)
    {
        return view('pages.suplemen.show', [
                'record' =>$suplemenmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.suplemen.create', [
            'model' => new SuplemenModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuplemenModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuplemenModel saved successfully');
            return redirect()->route('suplemen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuplemenModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuplemenModel  $suplemenmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuplemenModel $suplemenmodel)
    {

        return view('pages.suplemen.edit', [
            'model' => $suplemenmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuplemenModel  $suplemenmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuplemenModel $suplemenmodel)
    {
        $suplemenmodel->fill($request->all());

        if ($suplemenmodel->save()) {
            
            session()->flash('app_message', 'SuplemenModel successfully updated');
            return redirect()->route('suplemen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuplemenModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuplemenModel  $suplemenmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuplemenModel $suplemenmodel)
    {
        if ($suplemenmodel->delete()) {
                session()->flash('app_message', 'SuplemenModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuplemenModel');
            }

        return redirect()->back();
    }
}
