<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratMasukModel;


/**
 * Description of SuratMasukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuratMasukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.surat_masuk.index', ['records' => SuratMasukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuratMasukModel  $suratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SuratMasukModel $suratmasukmodel)
    {
        return view('pages.surat_masuk.show', [
                'record' =>$suratmasukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.surat_masuk.create', [
            'model' => new SuratMasukModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuratMasukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuratMasukModel saved successfully');
            return redirect()->route('surat_masuk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuratMasukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuratMasukModel  $suratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuratMasukModel $suratmasukmodel)
    {

        return view('pages.surat_masuk.edit', [
            'model' => $suratmasukmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuratMasukModel  $suratmasukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuratMasukModel $suratmasukmodel)
    {
        $suratmasukmodel->fill($request->all());

        if ($suratmasukmodel->save()) {
            
            session()->flash('app_message', 'SuratMasukModel successfully updated');
            return redirect()->route('surat_masuk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuratMasukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuratMasukModel  $suratmasukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuratMasukModel $suratmasukmodel)
    {
        if ($suratmasukmodel->delete()) {
                session()->flash('app_message', 'SuratMasukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuratMasukModel');
            }

        return redirect()->back();
    }
}
