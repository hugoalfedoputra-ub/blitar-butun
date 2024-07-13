<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukAsuransiModel;


/**
 * Description of TwebPendudukAsuransiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukAsuransiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_asuransi.index', ['records' => TwebPendudukAsuransiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransiModel  $twebpendudukasuransimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukAsuransiModel $twebpendudukasuransimodel)
    {
        return view('pages.tweb_penduduk_asuransi.show', [
                'record' =>$twebpendudukasuransimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_asuransi.create', [
            'model' => new TwebPendudukAsuransiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukAsuransiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukAsuransiModel saved successfully');
            return redirect()->route('tweb_penduduk_asuransi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukAsuransiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransiModel  $twebpendudukasuransimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukAsuransiModel $twebpendudukasuransimodel)
    {

        return view('pages.tweb_penduduk_asuransi.edit', [
            'model' => $twebpendudukasuransimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransiModel  $twebpendudukasuransimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukAsuransiModel $twebpendudukasuransimodel)
    {
        $twebpendudukasuransimodel->fill($request->all());

        if ($twebpendudukasuransimodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukAsuransiModel successfully updated');
            return redirect()->route('tweb_penduduk_asuransi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukAsuransiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransiModel  $twebpendudukasuransimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukAsuransiModel $twebpendudukasuransimodel)
    {
        if ($twebpendudukasuransimodel->delete()) {
                session()->flash('app_message', 'TwebPendudukAsuransiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukAsuransiModel');
            }

        return redirect()->back();
    }
}
