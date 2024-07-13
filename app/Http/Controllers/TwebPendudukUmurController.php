<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukUmurModel;


/**
 * Description of TwebPendudukUmurController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukUmurController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_umur.index', ['records' => TwebPendudukUmurModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmurModel  $twebpendudukumurmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukUmurModel $twebpendudukumurmodel)
    {
        return view('pages.tweb_penduduk_umur.show', [
                'record' =>$twebpendudukumurmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_umur.create', [
            'model' => new TwebPendudukUmurModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukUmurModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukUmurModel saved successfully');
            return redirect()->route('tweb_penduduk_umur.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukUmurModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmurModel  $twebpendudukumurmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukUmurModel $twebpendudukumurmodel)
    {

        return view('pages.tweb_penduduk_umur.edit', [
            'model' => $twebpendudukumurmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmurModel  $twebpendudukumurmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukUmurModel $twebpendudukumurmodel)
    {
        $twebpendudukumurmodel->fill($request->all());

        if ($twebpendudukumurmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukUmurModel successfully updated');
            return redirect()->route('tweb_penduduk_umur.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukUmurModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmurModel  $twebpendudukumurmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukUmurModel $twebpendudukumurmodel)
    {
        if ($twebpendudukumurmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukUmurModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukUmurModel');
            }

        return redirect()->back();
    }
}
