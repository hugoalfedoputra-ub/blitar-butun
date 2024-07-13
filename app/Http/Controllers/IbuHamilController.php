<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IbuHamilModel;


/**
 * Description of IbuHamilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class IbuHamilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ibu_hamil.index', ['records' => IbuHamilModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  IbuHamilModel  $ibuhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, IbuHamilModel $ibuhamilmodel)
    {
        return view('pages.ibu_hamil.show', [
                'record' =>$ibuhamilmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ibu_hamil.create', [
            'model' => new IbuHamilModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new IbuHamilModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'IbuHamilModel saved successfully');
            return redirect()->route('ibu_hamil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving IbuHamilModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  IbuHamilModel  $ibuhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, IbuHamilModel $ibuhamilmodel)
    {

        return view('pages.ibu_hamil.edit', [
            'model' => $ibuhamilmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  IbuHamilModel  $ibuhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,IbuHamilModel $ibuhamilmodel)
    {
        $ibuhamilmodel->fill($request->all());

        if ($ibuhamilmodel->save()) {
            
            session()->flash('app_message', 'IbuHamilModel successfully updated');
            return redirect()->route('ibu_hamil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating IbuHamilModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  IbuHamilModel  $ibuhamilmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, IbuHamilModel $ibuhamilmodel)
    {
        if ($ibuhamilmodel->delete()) {
                session()->flash('app_message', 'IbuHamilModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting IbuHamilModel');
            }

        return redirect()->back();
    }
}
