<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisKategoriIndikator;


/**
 * Description of AnalisisKategoriIndikatorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisKategoriIndikatorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisKategoriIndikator::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikator  $analisiskategoriindikator
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisiskategoriindikator = AnalisisKategoriIndikator::find($id);
        if ($analisiskategoriindikator) {
            return response()->json($analisiskategoriindikator);
        }
        return response()->json(['message' => 'AnalisisKategoriIndikator not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_kategori_indikator.create', [
            'model' => new AnalisisKategoriIndikator,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisKategoriIndikator;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisKategoriIndikator saved successfully');
            return redirect()->route('analisis_kategori_indikator.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisKategoriIndikator');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikator  $analisiskategoriindikator
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisKategoriIndikator $analisiskategoriindikator)
    {

        return view('pages.analisis_kategori_indikator.edit', [
            'model' => $analisiskategoriindikator,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikator  $analisiskategoriindikator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisKategoriIndikator $analisiskategoriindikator)
    {
        $analisiskategoriindikator->fill($request->all());

        if ($analisiskategoriindikator->save()) {
            
            session()->flash('app_message', 'AnalisisKategoriIndikator successfully updated');
            return redirect()->route('analisis_kategori_indikator.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisKategoriIndikator');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisKategoriIndikator  $analisiskategoriindikator
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisKategoriIndikator $analisiskategoriindikator)
    {
        if ($analisiskategoriindikator->delete()) {
                session()->flash('app_message', 'AnalisisKategoriIndikator successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisKategoriIndikator');
            }

        return redirect()->back();
    }
}
