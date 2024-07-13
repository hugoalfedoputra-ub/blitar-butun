<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukKawinModel;


/**
 * Description of TwebPendudukKawinController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukKawinController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_kawin.index', ['records' => TwebPendudukKawinModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawinModel  $twebpendudukkawinmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukKawinModel $twebpendudukkawinmodel)
    {
        return view('pages.tweb_penduduk_kawin.show', [
                'record' =>$twebpendudukkawinmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_kawin.create', [
            'model' => new TwebPendudukKawinModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukKawinModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukKawinModel saved successfully');
            return redirect()->route('tweb_penduduk_kawin.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukKawinModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawinModel  $twebpendudukkawinmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukKawinModel $twebpendudukkawinmodel)
    {

        return view('pages.tweb_penduduk_kawin.edit', [
            'model' => $twebpendudukkawinmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawinModel  $twebpendudukkawinmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukKawinModel $twebpendudukkawinmodel)
    {
        $twebpendudukkawinmodel->fill($request->all());

        if ($twebpendudukkawinmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukKawinModel successfully updated');
            return redirect()->route('tweb_penduduk_kawin.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukKawinModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawinModel  $twebpendudukkawinmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukKawinModel $twebpendudukkawinmodel)
    {
        if ($twebpendudukkawinmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukKawinModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukKawinModel');
            }

        return redirect()->back();
    }
}
