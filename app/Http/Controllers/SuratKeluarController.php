<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;


/**
 * Description of SuratKeluarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuratKeluarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return SuratKeluar::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuratKeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $suratkeluar = SuratKeluar::find($id);
        if ($suratkeluar) {
            return response()->json($suratkeluar);
        }
        return response()->json(['message' => 'SuratKeluar not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.surat_keluar.create', [
            'model' => new SuratKeluar,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuratKeluar;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuratKeluar saved successfully');
            return redirect()->route('surat_keluar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuratKeluar');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuratKeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuratKeluar $suratkeluar)
    {

        return view('pages.surat_keluar.edit', [
            'model' => $suratkeluar,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuratKeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuratKeluar $suratkeluar)
    {
        $suratkeluar->fill($request->all());

        if ($suratkeluar->save()) {
            
            session()->flash('app_message', 'SuratKeluar successfully updated');
            return redirect()->route('surat_keluar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuratKeluar');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuratKeluar  $suratkeluar
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuratKeluar $suratkeluar)
    {
        if ($suratkeluar->delete()) {
                session()->flash('app_message', 'SuratKeluar successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuratKeluar');
            }

        return redirect()->back();
    }
}
