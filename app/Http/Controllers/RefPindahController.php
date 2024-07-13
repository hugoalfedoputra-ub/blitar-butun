<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPindahModel;


/**
 * Description of RefPindahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPindahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_pindah.index', ['records' => RefPindahModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPindahModel  $refpindahmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPindahModel $refpindahmodel)
    {
        return view('pages.ref_pindah.show', [
                'record' =>$refpindahmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_pindah.create', [
            'model' => new RefPindahModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPindahModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPindahModel saved successfully');
            return redirect()->route('ref_pindah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPindahModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPindahModel  $refpindahmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPindahModel $refpindahmodel)
    {

        return view('pages.ref_pindah.edit', [
            'model' => $refpindahmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPindahModel  $refpindahmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPindahModel $refpindahmodel)
    {
        $refpindahmodel->fill($request->all());

        if ($refpindahmodel->save()) {
            
            session()->flash('app_message', 'RefPindahModel successfully updated');
            return redirect()->route('ref_pindah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPindahModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPindahModel  $refpindahmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPindahModel $refpindahmodel)
    {
        if ($refpindahmodel->delete()) {
                session()->flash('app_message', 'RefPindahModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPindahModel');
            }

        return redirect()->back();
    }
}
