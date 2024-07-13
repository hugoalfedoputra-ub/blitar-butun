<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPendidikan;


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
        return TwebPendudukPendidikan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikan  $twebpendudukpendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukPendidikan $twebpendudukpendidikan)
    {
        return view('pages.tweb_penduduk_pendidikan.show', [
                'record' =>$twebpendudukpendidikan,
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
            'model' => new TwebPendudukPendidikan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPendidikan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikan saved successfully');
            return redirect()->route('tweb_penduduk_pendidikan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPendidikan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikan  $twebpendudukpendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPendidikan $twebpendudukpendidikan)
    {

        return view('pages.tweb_penduduk_pendidikan.edit', [
            'model' => $twebpendudukpendidikan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikan  $twebpendudukpendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPendidikan $twebpendudukpendidikan)
    {
        $twebpendudukpendidikan->fill($request->all());

        if ($twebpendudukpendidikan->save()) {
            
            session()->flash('app_message', 'TwebPendudukPendidikan successfully updated');
            return redirect()->route('tweb_penduduk_pendidikan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPendidikan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPendidikan  $twebpendudukpendidikan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPendidikan $twebpendudukpendidikan)
    {
        if ($twebpendudukpendidikan->delete()) {
                session()->flash('app_message', 'TwebPendudukPendidikan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPendidikan');
            }

        return redirect()->back();
    }
}
