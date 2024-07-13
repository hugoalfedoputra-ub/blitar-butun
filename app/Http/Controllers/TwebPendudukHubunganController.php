<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukHubunganModel;


/**
 * Description of TwebPendudukHubunganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukHubunganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_hubungan.index', ['records' => TwebPendudukHubunganModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubunganModel  $twebpendudukhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukHubunganModel $twebpendudukhubunganmodel)
    {
        return view('pages.tweb_penduduk_hubungan.show', [
                'record' =>$twebpendudukhubunganmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_hubungan.create', [
            'model' => new TwebPendudukHubunganModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukHubunganModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukHubunganModel saved successfully');
            return redirect()->route('tweb_penduduk_hubungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukHubunganModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubunganModel  $twebpendudukhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukHubunganModel $twebpendudukhubunganmodel)
    {

        return view('pages.tweb_penduduk_hubungan.edit', [
            'model' => $twebpendudukhubunganmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubunganModel  $twebpendudukhubunganmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukHubunganModel $twebpendudukhubunganmodel)
    {
        $twebpendudukhubunganmodel->fill($request->all());

        if ($twebpendudukhubunganmodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukHubunganModel successfully updated');
            return redirect()->route('tweb_penduduk_hubungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukHubunganModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubunganModel  $twebpendudukhubunganmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukHubunganModel $twebpendudukhubunganmodel)
    {
        if ($twebpendudukhubunganmodel->delete()) {
                session()->flash('app_message', 'TwebPendudukHubunganModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukHubunganModel');
            }

        return redirect()->back();
    }
}
