<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukSukuModel;


/**
 * Description of RefPendudukSukuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukSukuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_penduduk_suku.index', ['records' => RefPendudukSukuModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukSukuModel  $refpenduduksukumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukSukuModel $refpenduduksukumodel)
    {
        return view('pages.ref_penduduk_suku.show', [
                'record' =>$refpenduduksukumodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_suku.create', [
            'model' => new RefPendudukSukuModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukSukuModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukSukuModel saved successfully');
            return redirect()->route('ref_penduduk_suku.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukSukuModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukSukuModel  $refpenduduksukumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukSukuModel $refpenduduksukumodel)
    {

        return view('pages.ref_penduduk_suku.edit', [
            'model' => $refpenduduksukumodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukSukuModel  $refpenduduksukumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukSukuModel $refpenduduksukumodel)
    {
        $refpenduduksukumodel->fill($request->all());

        if ($refpenduduksukumodel->save()) {
            
            session()->flash('app_message', 'RefPendudukSukuModel successfully updated');
            return redirect()->route('ref_penduduk_suku.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukSukuModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukSukuModel  $refpenduduksukumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukSukuModel $refpenduduksukumodel)
    {
        if ($refpenduduksukumodel->delete()) {
                session()->flash('app_message', 'RefPendudukSukuModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukSukuModel');
            }

        return redirect()->back();
    }
}
