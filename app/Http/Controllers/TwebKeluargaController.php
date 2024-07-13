<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebKeluarga;


/**
 * Description of TwebKeluargaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebKeluargaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebKeluarga::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluarga  $twebkeluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebKeluarga $twebkeluarga)
    {
        return view('pages.tweb_keluarga.show', [
                'record' =>$twebkeluarga,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_keluarga.create', [
            'model' => new TwebKeluarga,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebKeluarga;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebKeluarga saved successfully');
            return redirect()->route('tweb_keluarga.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebKeluarga');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluarga  $twebkeluarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebKeluarga $twebkeluarga)
    {

        return view('pages.tweb_keluarga.edit', [
            'model' => $twebkeluarga,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebKeluarga  $twebkeluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebKeluarga $twebkeluarga)
    {
        $twebkeluarga->fill($request->all());

        if ($twebkeluarga->save()) {
            
            session()->flash('app_message', 'TwebKeluarga successfully updated');
            return redirect()->route('tweb_keluarga.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebKeluarga');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebKeluarga  $twebkeluarga
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebKeluarga $twebkeluarga)
    {
        if ($twebkeluarga->delete()) {
                session()->flash('app_message', 'TwebKeluarga successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebKeluarga');
            }

        return redirect()->back();
    }
}
