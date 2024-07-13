<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukWarganegara;


/**
 * Description of TwebPendudukWarganegaraController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukWarganegaraController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukWarganegara::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegara  $twebpendudukwarganegara
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukWarganegara $twebpendudukwarganegara)
    {
        return view('pages.tweb_penduduk_warganegara.show', [
                'record' =>$twebpendudukwarganegara,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_warganegara.create', [
            'model' => new TwebPendudukWarganegara,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukWarganegara;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukWarganegara saved successfully');
            return redirect()->route('tweb_penduduk_warganegara.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukWarganegara');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegara  $twebpendudukwarganegara
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukWarganegara $twebpendudukwarganegara)
    {

        return view('pages.tweb_penduduk_warganegara.edit', [
            'model' => $twebpendudukwarganegara,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegara  $twebpendudukwarganegara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukWarganegara $twebpendudukwarganegara)
    {
        $twebpendudukwarganegara->fill($request->all());

        if ($twebpendudukwarganegara->save()) {
            
            session()->flash('app_message', 'TwebPendudukWarganegara successfully updated');
            return redirect()->route('tweb_penduduk_warganegara.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukWarganegara');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukWarganegara  $twebpendudukwarganegara
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukWarganegara $twebpendudukwarganegara)
    {
        if ($twebpendudukwarganegara->delete()) {
                session()->flash('app_message', 'TwebPendudukWarganegara successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukWarganegara');
            }

        return redirect()->back();
    }
}
