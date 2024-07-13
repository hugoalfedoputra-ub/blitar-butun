<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukBahasa;


/**
 * Description of RefPendudukBahasaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukBahasaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPendudukBahasa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBahasa  $refpendudukbahasa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukBahasa $refpendudukbahasa)
    {
        return view('pages.ref_penduduk_bahasa.show', [
                'record' =>$refpendudukbahasa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_bahasa.create', [
            'model' => new RefPendudukBahasa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukBahasa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukBahasa saved successfully');
            return redirect()->route('ref_penduduk_bahasa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukBahasa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukBahasa  $refpendudukbahasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukBahasa $refpendudukbahasa)
    {

        return view('pages.ref_penduduk_bahasa.edit', [
            'model' => $refpendudukbahasa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBahasa  $refpendudukbahasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukBahasa $refpendudukbahasa)
    {
        $refpendudukbahasa->fill($request->all());

        if ($refpendudukbahasa->save()) {
            
            session()->flash('app_message', 'RefPendudukBahasa successfully updated');
            return redirect()->route('ref_penduduk_bahasa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukBahasa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukBahasa  $refpendudukbahasa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukBahasa $refpendudukbahasa)
    {
        if ($refpendudukbahasa->delete()) {
                session()->flash('app_message', 'RefPendudukBahasa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukBahasa');
            }

        return redirect()->back();
    }
}
