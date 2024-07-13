<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukPekerjaan;


/**
 * Description of TwebPendudukPekerjaanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukPekerjaanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukPekerjaan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaan  $twebpendudukpekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebpendudukpekerjaan = TwebPendudukPekerjaan::find($id);
        if ($twebpendudukpekerjaan) {
            return response()->json($twebpendudukpekerjaan);
        }
        return response()->json(['message' => 'TwebPendudukPekerjaan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_pekerjaan.create', [
            'model' => new TwebPendudukPekerjaan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukPekerjaan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukPekerjaan saved successfully');
            return redirect()->route('tweb_penduduk_pekerjaan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukPekerjaan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaan  $twebpendudukpekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukPekerjaan $twebpendudukpekerjaan)
    {

        return view('pages.tweb_penduduk_pekerjaan.edit', [
            'model' => $twebpendudukpekerjaan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaan  $twebpendudukpekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukPekerjaan $twebpendudukpekerjaan)
    {
        $twebpendudukpekerjaan->fill($request->all());

        if ($twebpendudukpekerjaan->save()) {
            
            session()->flash('app_message', 'TwebPendudukPekerjaan successfully updated');
            return redirect()->route('tweb_penduduk_pekerjaan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukPekerjaan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukPekerjaan  $twebpendudukpekerjaan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukPekerjaan $twebpendudukpekerjaan)
    {
        if ($twebpendudukpekerjaan->delete()) {
                session()->flash('app_message', 'TwebPendudukPekerjaan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukPekerjaan');
            }

        return redirect()->back();
    }
}
