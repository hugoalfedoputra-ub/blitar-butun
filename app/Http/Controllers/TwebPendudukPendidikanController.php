<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPendidikanModel;


/**
 * Description of TwebPendudukPendidikanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukPendidikanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_pendidikan.index', ['records' => TwebPendudukPendidikanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanModel  $twebpendudukpendidikanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukPendidikanModel $twebpendudukpendidikanmodel)
    {
        return view('pages.tweb_penduduk_pendidikan.show', [
                'record' =>$twebpendudukpendidikanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_pendidikan.create', [
            'model' => new TwebPendudukPendidikanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPendidikanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanModel saved successfully');
            return redirect()->route('tweb_penduduk_pendidikan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPendidikanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanModel  $twebpendudukpendidikanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPendidikanModel $twebpendudukpendidikanmodel)
    {

        return view('pages.tweb_penduduk_pendidikan.edit', [
            'model' => $twebpendudukpendidikanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanModel  $twebpendudukpendidikanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPendidikanModel $twebpendudukpendidikanmodel)
    {
        $twebpendudukpendidikanmodel->fill($request->all());

        if ($twebpendudukpendidikanmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanModel successfully updated');
            return redirect()->route('tweb_penduduk_pendidikan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPendidikanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanModel  $twebpendudukpendidikanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPendidikanModel $twebpendudukpendidikanmodel)
    {
        if ($twebpendudukpendidikanmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukPendidikanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPendidikanModel');
            }

        return redirect()->back();
    }
}
