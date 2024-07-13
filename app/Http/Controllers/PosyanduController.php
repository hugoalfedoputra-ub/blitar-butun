<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PosyanduModel;


/**
 * Description of PosyanduController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PosyanduController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.posyandu.index', ['records' => PosyanduModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PosyanduModel  $posyandumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PosyanduModel $posyandumodel)
    {
        return view('pages.posyandu.show', [
                'record' =>$posyandumodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.posyandu.create', [
            'model' => new PosyanduModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PosyanduModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PosyanduModel saved successfully');
            return redirect()->route('posyandu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PosyanduModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PosyanduModel  $posyandumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PosyanduModel $posyandumodel)
    {

        return view('pages.posyandu.edit', [
            'model' => $posyandumodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PosyanduModel  $posyandumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PosyanduModel $posyandumodel)
    {
        $posyandumodel->fill($request->all());

        if ($posyandumodel->save()) {
            
            session()->flash('app_message', 'PosyanduModel successfully updated');
            return redirect()->route('posyandu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PosyanduModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PosyanduModel  $posyandumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PosyanduModel $posyandumodel)
    {
        if ($posyandumodel->delete()) {
                session()->flash('app_message', 'PosyanduModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PosyanduModel');
            }

        return redirect()->back();
    }
}
