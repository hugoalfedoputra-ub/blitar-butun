<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefAsalTanahKasModel;


/**
 * Description of RefAsalTanahKasController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefAsalTanahKasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_asal_tanah_kas.index', ['records' => RefAsalTanahKasModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKasModel  $refasaltanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefAsalTanahKasModel $refasaltanahkasmodel)
    {
        return view('pages.ref_asal_tanah_kas.show', [
                'record' =>$refasaltanahkasmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_asal_tanah_kas.create', [
            'model' => new RefAsalTanahKasModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefAsalTanahKasModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefAsalTanahKasModel saved successfully');
            return redirect()->route('ref_asal_tanah_kas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefAsalTanahKasModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKasModel  $refasaltanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefAsalTanahKasModel $refasaltanahkasmodel)
    {

        return view('pages.ref_asal_tanah_kas.edit', [
            'model' => $refasaltanahkasmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKasModel  $refasaltanahkasmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefAsalTanahKasModel $refasaltanahkasmodel)
    {
        $refasaltanahkasmodel->fill($request->all());

        if ($refasaltanahkasmodel->save()) {
            
            session()->flash('app_message', 'RefAsalTanahKasModel successfully updated');
            return redirect()->route('ref_asal_tanah_kas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefAsalTanahKasModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKasModel  $refasaltanahkasmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefAsalTanahKasModel $refasaltanahkasmodel)
    {
        if ($refasaltanahkasmodel->delete()) {
                session()->flash('app_message', 'RefAsalTanahKasModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefAsalTanahKasModel');
            }

        return redirect()->back();
    }
}
