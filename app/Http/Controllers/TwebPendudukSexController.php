<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukSexModel;


/**
 * Description of TwebPendudukSexController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukSexController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_sex.index', ['records' => TwebPendudukSexModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukSexModel  $twebpenduduksexmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukSexModel $twebpenduduksexmodel)
    {
        return view('pages.tweb_penduduk_sex.show', [
                'record' =>$twebpenduduksexmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_sex.create', [
            'model' => new TwebPendudukSexModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukSexModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukSexModel saved successfully');
            return redirect()->route('tweb_penduduk_sex.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukSexModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukSexModel  $twebpenduduksexmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukSexModel $twebpenduduksexmodel)
    {

        return view('pages.tweb_penduduk_sex.edit', [
            'model' => $twebpenduduksexmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukSexModel  $twebpenduduksexmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukSexModel $twebpenduduksexmodel)
    {
        $twebpenduduksexmodel->fill($request->all());

        if ($twebpenduduksexmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukSexModel successfully updated');
            return redirect()->route('tweb_penduduk_sex.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukSexModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukSexModel  $twebpenduduksexmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukSexModel $twebpenduduksexmodel)
    {
        if ($twebpenduduksexmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukSexModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukSexModel');
            }

        return redirect()->back();
    }
}
