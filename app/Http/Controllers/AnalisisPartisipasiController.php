<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisPartisipasi;


/**
 * Description of AnalisisPartisipasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisPartisipasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisPartisipasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasi  $analisispartisipasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisPartisipasi $analisispartisipasi)
    {
        return view('pages.analisis_partisipasi.show', [
                'record' =>$analisispartisipasi,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_partisipasi.create', [
            'model' => new AnalisisPartisipasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisPartisipasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisPartisipasi saved successfully');
            return redirect()->route('analisis_partisipasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisPartisipasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasi  $analisispartisipasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisPartisipasi $analisispartisipasi)
    {

        return view('pages.analisis_partisipasi.edit', [
            'model' => $analisispartisipasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasi  $analisispartisipasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisPartisipasi $analisispartisipasi)
    {
        $analisispartisipasi->fill($request->all());

        if ($analisispartisipasi->save()) {
            
            session()->flash('app_message', 'AnalisisPartisipasi successfully updated');
            return redirect()->route('analisis_partisipasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisPartisipasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisPartisipasi  $analisispartisipasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisPartisipasi $analisispartisipasi)
    {
        if ($analisispartisipasi->delete()) {
                session()->flash('app_message', 'AnalisisPartisipasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisPartisipasi');
            }

        return redirect()->back();
    }
}
