<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPekerjaanModel;


/**
 * Description of TwebPendudukPekerjaanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukPekerjaanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_pekerjaan.index', ['records' => TwebPendudukPekerjaanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaanModel  $twebpendudukpekerjaanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukPekerjaanModel $twebpendudukpekerjaanmodel)
    {
        return view('pages.tweb_penduduk_pekerjaan.show', [
                'record' =>$twebpendudukpekerjaanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_pekerjaan.create', [
            'model' => new TwebPendudukPekerjaanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPekerjaanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPekerjaanModel saved successfully');
            return redirect()->route('tweb_penduduk_pekerjaan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPekerjaanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaanModel  $twebpendudukpekerjaanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPekerjaanModel $twebpendudukpekerjaanmodel)
    {

        return view('pages.tweb_penduduk_pekerjaan.edit', [
            'model' => $twebpendudukpekerjaanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaanModel  $twebpendudukpekerjaanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPekerjaanModel $twebpendudukpekerjaanmodel)
    {
        $twebpendudukpekerjaanmodel->fill($request->all());

        if ($twebpendudukpekerjaanmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukPekerjaanModel successfully updated');
            return redirect()->route('tweb_penduduk_pekerjaan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPekerjaanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaanModel  $twebpendudukpekerjaanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPekerjaanModel $twebpendudukpekerjaanmodel)
    {
        if ($twebpendudukpekerjaanmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukPekerjaanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPekerjaanModel');
            }

        return redirect()->back();
    }
}
