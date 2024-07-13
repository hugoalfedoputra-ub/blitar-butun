<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluarModel;


/**
 * Description of SuratKeluarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuratKeluarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.surat_keluar.index', ['records' => SuratKeluarModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuratKeluarModel  $suratkeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SuratKeluarModel $suratkeluarmodel)
    {
        return view('pages.surat_keluar.show', [
                'record' =>$suratkeluarmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.surat_keluar.create', [
            'model' => new SuratKeluarModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuratKeluarModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuratKeluarModel saved successfully');
            return redirect()->route('surat_keluar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuratKeluarModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuratKeluarModel  $suratkeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuratKeluarModel $suratkeluarmodel)
    {

        return view('pages.surat_keluar.edit', [
            'model' => $suratkeluarmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuratKeluarModel  $suratkeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuratKeluarModel $suratkeluarmodel)
    {
        $suratkeluarmodel->fill($request->all());

        if ($suratkeluarmodel->save()) {
            
            session()->flash('app_message', 'SuratKeluarModel successfully updated');
            return redirect()->route('surat_keluar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuratKeluarModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuratKeluarModel  $suratkeluarmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuratKeluarModel $suratkeluarmodel)
    {
        if ($suratkeluarmodel->delete()) {
                session()->flash('app_message', 'SuratKeluarModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuratKeluarModel');
            }

        return redirect()->back();
    }
}
