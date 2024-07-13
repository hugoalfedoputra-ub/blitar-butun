<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukSex;


/**
 * Description of TwebPendudukSexController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukSexController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukSex::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukSex  $twebpenduduksex
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukSex $twebpenduduksex)
    {
        return view('pages.tweb_penduduk_sex.show', [
                'record' =>$twebpenduduksex,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_sex.create', [
            'model' => new TwebPendudukSex,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukSex;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukSex saved successfully');
            return redirect()->route('tweb_penduduk_sex.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukSex');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukSex  $twebpenduduksex
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukSex $twebpenduduksex)
    {

        return view('pages.tweb_penduduk_sex.edit', [
            'model' => $twebpenduduksex,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukSex  $twebpenduduksex
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukSex $twebpenduduksex)
    {
        $twebpenduduksex->fill($request->all());

        if ($twebpenduduksex->save()) {
            
            session()->flash('app_message', 'TwebPendudukSex successfully updated');
            return redirect()->route('tweb_penduduk_sex.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukSex');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukSex  $twebpenduduksex
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukSex $twebpenduduksex)
    {
        if ($twebpenduduksex->delete()) {
                session()->flash('app_message', 'TwebPendudukSex successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukSex');
            }

        return redirect()->back();
    }
}
