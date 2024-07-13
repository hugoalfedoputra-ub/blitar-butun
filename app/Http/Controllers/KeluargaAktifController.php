<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeluargaAktif;


/**
 * Description of KeluargaAktifController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeluargaAktifController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeluargaAktif::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeluargaAktif  $keluargaaktif
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeluargaAktif $keluargaaktif)
    {
        return view('pages.keluarga_aktif.show', [
                'record' =>$keluargaaktif,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.keluarga_aktif.create', [
            'model' => new KeluargaAktif,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeluargaAktif;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeluargaAktif saved successfully');
            return redirect()->route('keluarga_aktif.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeluargaAktif');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeluargaAktif  $keluargaaktif
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeluargaAktif $keluargaaktif)
    {

        return view('pages.keluarga_aktif.edit', [
            'model' => $keluargaaktif,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeluargaAktif  $keluargaaktif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeluargaAktif $keluargaaktif)
    {
        $keluargaaktif->fill($request->all());

        if ($keluargaaktif->save()) {
            
            session()->flash('app_message', 'KeluargaAktif successfully updated');
            return redirect()->route('keluarga_aktif.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeluargaAktif');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeluargaAktif  $keluargaaktif
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeluargaAktif $keluargaaktif)
    {
        if ($keluargaaktif->delete()) {
                session()->flash('app_message', 'KeluargaAktif successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeluargaAktif');
            }

        return redirect()->back();
    }
}
