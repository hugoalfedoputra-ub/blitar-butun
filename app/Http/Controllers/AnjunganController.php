<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnjunganModel;


/**
 * Description of AnjunganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnjunganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.anjungan.index', ['records' => AnjunganModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganModel  $anjunganmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnjunganModel $anjunganmodel)
    {
        return view('pages.anjungan.show', [
                'record' =>$anjunganmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.anjungan.create', [
            'model' => new AnjunganModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnjunganModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnjunganModel saved successfully');
            return redirect()->route('anjungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnjunganModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganModel  $anjunganmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnjunganModel $anjunganmodel)
    {

        return view('pages.anjungan.edit', [
            'model' => $anjunganmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnjunganModel  $anjunganmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnjunganModel $anjunganmodel)
    {
        $anjunganmodel->fill($request->all());

        if ($anjunganmodel->save()) {
            
            session()->flash('app_message', 'AnjunganModel successfully updated');
            return redirect()->route('anjungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnjunganModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnjunganModel  $anjunganmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnjunganModel $anjunganmodel)
    {
        if ($anjunganmodel->delete()) {
                session()->flash('app_message', 'AnjunganModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnjunganModel');
            }

        return redirect()->back();
    }
}
