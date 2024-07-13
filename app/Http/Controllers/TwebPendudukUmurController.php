<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukUmur;


/**
 * Description of TwebPendudukUmurController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukUmurController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_umur.index', ['records' => TwebPendudukUmur::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmur  $twebpendudukumur
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukUmur $twebpendudukumur)
    {
        return view('pages.tweb_penduduk_umur.show', [
                'record' =>$twebpendudukumur,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_umur.create', [
            'model' => new TwebPendudukUmur,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukUmur;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukUmur saved successfully');
            return redirect()->route('tweb_penduduk_umur.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukUmur');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmur  $twebpendudukumur
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukUmur $twebpendudukumur)
    {

        return view('pages.tweb_penduduk_umur.edit', [
            'model' => $twebpendudukumur,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmur  $twebpendudukumur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukUmur $twebpendudukumur)
    {
        $twebpendudukumur->fill($request->all());

        if ($twebpendudukumur->save()) {
            
            session()->flash('app_message', 'TwebPendudukUmur successfully updated');
            return redirect()->route('tweb_penduduk_umur.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukUmur');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukUmur  $twebpendudukumur
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukUmur $twebpendudukumur)
    {
        if ($twebpendudukumur->delete()) {
                session()->flash('app_message', 'TwebPendudukUmur successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukUmur');
            }

        return redirect()->back();
    }
}
