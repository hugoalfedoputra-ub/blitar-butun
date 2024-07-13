<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisKlasifikasi;


/**
 * Description of AnalisisKlasifikasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisKlasifikasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.analisis_klasifikasi.index', ['records' => AnalisisKlasifikasi::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasi  $analisisklasifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnalisisKlasifikasi $analisisklasifikasi)
    {
        return view('pages.analisis_klasifikasi.show', [
                'record' =>$analisisklasifikasi,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_klasifikasi.create', [
            'model' => new AnalisisKlasifikasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisKlasifikasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisKlasifikasi saved successfully');
            return redirect()->route('analisis_klasifikasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisKlasifikasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasi  $analisisklasifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisKlasifikasi $analisisklasifikasi)
    {

        return view('pages.analisis_klasifikasi.edit', [
            'model' => $analisisklasifikasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasi  $analisisklasifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisKlasifikasi $analisisklasifikasi)
    {
        $analisisklasifikasi->fill($request->all());

        if ($analisisklasifikasi->save()) {
            
            session()->flash('app_message', 'AnalisisKlasifikasi successfully updated');
            return redirect()->route('analisis_klasifikasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisKlasifikasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisKlasifikasi  $analisisklasifikasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisKlasifikasi $analisisklasifikasi)
    {
        if ($analisisklasifikasi->delete()) {
                session()->flash('app_message', 'AnalisisKlasifikasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisKlasifikasi');
            }

        return redirect()->back();
    }
}
