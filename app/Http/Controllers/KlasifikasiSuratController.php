<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSurat;


/**
 * Description of KlasifikasiSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KlasifikasiSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.klasifikasi_surat.index', ['records' => KlasifikasiSurat::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KlasifikasiSurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KlasifikasiSurat $klasifikasisurat)
    {
        return view('pages.klasifikasi_surat.show', [
                'record' =>$klasifikasisurat,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.klasifikasi_surat.create', [
            'model' => new KlasifikasiSurat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KlasifikasiSurat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KlasifikasiSurat saved successfully');
            return redirect()->route('klasifikasi_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KlasifikasiSurat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KlasifikasiSurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KlasifikasiSurat $klasifikasisurat)
    {

        return view('pages.klasifikasi_surat.edit', [
            'model' => $klasifikasisurat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KlasifikasiSurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KlasifikasiSurat $klasifikasisurat)
    {
        $klasifikasisurat->fill($request->all());

        if ($klasifikasisurat->save()) {
            
            session()->flash('app_message', 'KlasifikasiSurat successfully updated');
            return redirect()->route('klasifikasi_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KlasifikasiSurat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KlasifikasiSurat  $klasifikasisurat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KlasifikasiSurat $klasifikasisurat)
    {
        if ($klasifikasisurat->delete()) {
                session()->flash('app_message', 'KlasifikasiSurat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KlasifikasiSurat');
            }

        return redirect()->back();
    }
}
