<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukAgama;


/**
 * Description of TwebPendudukAgamaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukAgamaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_agama.index', ['records' => TwebPendudukAgama::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgama  $twebpendudukagama
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukAgama $twebpendudukagama)
    {
        return view('pages.tweb_penduduk_agama.show', [
                'record' =>$twebpendudukagama,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_agama.create', [
            'model' => new TwebPendudukAgama,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukAgama;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukAgama saved successfully');
            return redirect()->route('tweb_penduduk_agama.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukAgama');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgama  $twebpendudukagama
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukAgama $twebpendudukagama)
    {

        return view('pages.tweb_penduduk_agama.edit', [
            'model' => $twebpendudukagama,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgama  $twebpendudukagama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukAgama $twebpendudukagama)
    {
        $twebpendudukagama->fill($request->all());

        if ($twebpendudukagama->save()) {
            
            session()->flash('app_message', 'TwebPendudukAgama successfully updated');
            return redirect()->route('tweb_penduduk_agama.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukAgama');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgama  $twebpendudukagama
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukAgama $twebpendudukagama)
    {
        if ($twebpendudukagama->delete()) {
                session()->flash('app_message', 'TwebPendudukAgama successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukAgama');
            }

        return redirect()->back();
    }
}
