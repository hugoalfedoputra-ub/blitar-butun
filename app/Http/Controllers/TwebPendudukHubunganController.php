<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukHubungan;


/**
 * Description of TwebPendudukHubunganController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukHubunganController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_hubungan.index', ['records' => TwebPendudukHubungan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubungan  $twebpendudukhubungan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukHubungan $twebpendudukhubungan)
    {
        return view('pages.tweb_penduduk_hubungan.show', [
                'record' =>$twebpendudukhubungan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_hubungan.create', [
            'model' => new TwebPendudukHubungan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukHubungan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukHubungan saved successfully');
            return redirect()->route('tweb_penduduk_hubungan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukHubungan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubungan  $twebpendudukhubungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukHubungan $twebpendudukhubungan)
    {

        return view('pages.tweb_penduduk_hubungan.edit', [
            'model' => $twebpendudukhubungan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubungan  $twebpendudukhubungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukHubungan $twebpendudukhubungan)
    {
        $twebpendudukhubungan->fill($request->all());

        if ($twebpendudukhubungan->save()) {
            
            session()->flash('app_message', 'TwebPendudukHubungan successfully updated');
            return redirect()->route('tweb_penduduk_hubungan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukHubungan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukHubungan  $twebpendudukhubungan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukHubungan $twebpendudukhubungan)
    {
        if ($twebpendudukhubungan->delete()) {
                session()->flash('app_message', 'TwebPendudukHubungan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukHubungan');
            }

        return redirect()->back();
    }
}
