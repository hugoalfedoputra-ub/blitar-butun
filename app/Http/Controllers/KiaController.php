<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KiaModel;


/**
 * Description of KiaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KiaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kia.index', ['records' => KiaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KiaModel  $kiamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KiaModel $kiamodel)
    {
        return view('pages.kia.show', [
                'record' =>$kiamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kia.create', [
            'model' => new KiaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KiaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KiaModel saved successfully');
            return redirect()->route('kia.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KiaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KiaModel  $kiamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KiaModel $kiamodel)
    {

        return view('pages.kia.edit', [
            'model' => $kiamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KiaModel  $kiamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KiaModel $kiamodel)
    {
        $kiamodel->fill($request->all());

        if ($kiamodel->save()) {
            
            session()->flash('app_message', 'KiaModel successfully updated');
            return redirect()->route('kia.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KiaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KiaModel  $kiamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KiaModel $kiamodel)
    {
        if ($kiamodel->delete()) {
                session()->flash('app_message', 'KiaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KiaModel');
            }

        return redirect()->back();
    }
}
