<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukModel;


/**
 * Description of TwebPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk.index', ['records' => TwebPendudukModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukModel  $twebpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukModel $twebpendudukmodel)
    {
        return view('pages.tweb_penduduk.show', [
                'record' =>$twebpendudukmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk.create', [
            'model' => new TwebPendudukModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukModel saved successfully');
            return redirect()->route('tweb_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukModel  $twebpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukModel $twebpendudukmodel)
    {

        return view('pages.tweb_penduduk.edit', [
            'model' => $twebpendudukmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukModel  $twebpendudukmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukModel $twebpendudukmodel)
    {
        $twebpendudukmodel->fill($request->all());

        if ($twebpendudukmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukModel successfully updated');
            return redirect()->route('tweb_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukModel  $twebpendudukmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukModel $twebpendudukmodel)
    {
        if ($twebpendudukmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukModel');
            }

        return redirect()->back();
    }
}
