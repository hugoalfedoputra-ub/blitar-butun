<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefPendudukHamil;


/**
 * Description of RefPendudukHamilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefPendudukHamilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefPendudukHamil::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukHamil  $refpendudukhamil
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefPendudukHamil $refpendudukhamil)
    {
        return view('pages.ref_penduduk_hamil.show', [
                'record' =>$refpendudukhamil,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_penduduk_hamil.create', [
            'model' => new RefPendudukHamil,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefPendudukHamil;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefPendudukHamil saved successfully');
            return redirect()->route('ref_penduduk_hamil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefPendudukHamil');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefPendudukHamil  $refpendudukhamil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefPendudukHamil $refpendudukhamil)
    {

        return view('pages.ref_penduduk_hamil.edit', [
            'model' => $refpendudukhamil,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefPendudukHamil  $refpendudukhamil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefPendudukHamil $refpendudukhamil)
    {
        $refpendudukhamil->fill($request->all());

        if ($refpendudukhamil->save()) {
            
            session()->flash('app_message', 'RefPendudukHamil successfully updated');
            return redirect()->route('ref_penduduk_hamil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefPendudukHamil');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefPendudukHamil  $refpendudukhamil
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefPendudukHamil $refpendudukhamil)
    {
        if ($refpendudukhamil->delete()) {
                session()->flash('app_message', 'RefPendudukHamil successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefPendudukHamil');
            }

        return redirect()->back();
    }
}
