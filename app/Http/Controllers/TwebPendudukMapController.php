<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukMapModel;


/**
 * Description of TwebPendudukMapController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukMapController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_map.index', ['records' => TwebPendudukMapModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMapModel  $twebpendudukmapmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukMapModel $twebpendudukmapmodel)
    {
        return view('pages.tweb_penduduk_map.show', [
                'record' =>$twebpendudukmapmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_map.create', [
            'model' => new TwebPendudukMapModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukMapModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukMapModel saved successfully');
            return redirect()->route('tweb_penduduk_map.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukMapModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMapModel  $twebpendudukmapmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukMapModel $twebpendudukmapmodel)
    {

        return view('pages.tweb_penduduk_map.edit', [
            'model' => $twebpendudukmapmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMapModel  $twebpendudukmapmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukMapModel $twebpendudukmapmodel)
    {
        $twebpendudukmapmodel->fill($request->all());

        if ($twebpendudukmapmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukMapModel successfully updated');
            return redirect()->route('tweb_penduduk_map.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukMapModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMapModel  $twebpendudukmapmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukMapModel $twebpendudukmapmodel)
    {
        if ($twebpendudukmapmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukMapModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukMapModel');
            }

        return redirect()->back();
    }
}
