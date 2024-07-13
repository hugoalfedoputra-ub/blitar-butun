<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukHamilModel;


/**
 * Description of RefPendudukHamilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukHamilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_penduduk_hamil.index', ['records' => RefPendudukHamilModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukHamilModel  $refpendudukhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukHamilModel $refpendudukhamilmodel)
    {
        return view('pages.ref_penduduk_hamil.show', [
                'record' =>$refpendudukhamilmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_hamil.create', [
            'model' => new RefPendudukHamilModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukHamilModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukHamilModel saved successfully');
            return redirect()->route('ref_penduduk_hamil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukHamilModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukHamilModel  $refpendudukhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukHamilModel $refpendudukhamilmodel)
    {

        return view('pages.ref_penduduk_hamil.edit', [
            'model' => $refpendudukhamilmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukHamilModel  $refpendudukhamilmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukHamilModel $refpendudukhamilmodel)
    {
        $refpendudukhamilmodel->fill($request->all());

        if ($refpendudukhamilmodel->save()) {
            
            session()->flash('app_message', 'RefPendudukHamilModel successfully updated');
            return redirect()->route('ref_penduduk_hamil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukHamilModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukHamilModel  $refpendudukhamilmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukHamilModel $refpendudukhamilmodel)
    {
        if ($refpendudukhamilmodel->delete()) {
                session()->flash('app_message', 'RefPendudukHamilModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukHamilModel');
            }

        return redirect()->back();
    }
}
