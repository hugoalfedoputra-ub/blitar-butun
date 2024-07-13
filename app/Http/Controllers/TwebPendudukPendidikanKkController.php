<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPendidikanKk;


/**
 * Description of TwebPendudukPendidikanKkController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukPendidikanKkController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_pendidikan_kk.index', ['records' => TwebPendudukPendidikanKk::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKk  $twebpendudukpendidikankk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukPendidikanKk $twebpendudukpendidikankk)
    {
        return view('pages.tweb_penduduk_pendidikan_kk.show', [
                'record' =>$twebpendudukpendidikankk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_pendidikan_kk.create', [
            'model' => new TwebPendudukPendidikanKk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPendidikanKk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanKk saved successfully');
            return redirect()->route('tweb_penduduk_pendidikan_kk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPendidikanKk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKk  $twebpendudukpendidikankk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPendidikanKk $twebpendudukpendidikankk)
    {

        return view('pages.tweb_penduduk_pendidikan_kk.edit', [
            'model' => $twebpendudukpendidikankk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKk  $twebpendudukpendidikankk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPendidikanKk $twebpendudukpendidikankk)
    {
        $twebpendudukpendidikankk->fill($request->all());

        if ($twebpendudukpendidikankk->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikanKk successfully updated');
            return redirect()->route('tweb_penduduk_pendidikan_kk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPendidikanKk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikanKk  $twebpendudukpendidikankk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPendidikanKk $twebpendudukpendidikankk)
    {
        if ($twebpendudukpendidikankk->delete()) {
                session()->flash('app_message', 'TwebPendudukPendidikanKk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPendidikanKk');
            }

        return redirect()->back();
    }
}
