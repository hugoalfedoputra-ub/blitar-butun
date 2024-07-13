<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukMandiri;
use App\Models\TwebPenduduk;


/**
 * Description of TwebPendudukMandiriController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukMandiriController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_mandiri.index', ['records' => TwebPendudukMandiri::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiri  $twebpendudukmandiri
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukMandiri $twebpendudukmandiri)
    {
        return view('pages.tweb_penduduk_mandiri.show', [
                'record' =>$twebpendudukmandiri,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.tweb_penduduk_mandiri.create', [
            'model' => new TwebPendudukMandiri,
			"tweb_penduduk" => $tweb_penduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukMandiri;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukMandiri saved successfully');
            return redirect()->route('tweb_penduduk_mandiri.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukMandiri');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiri  $twebpendudukmandiri
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukMandiri $twebpendudukmandiri)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.tweb_penduduk_mandiri.edit', [
            'model' => $twebpendudukmandiri,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiri  $twebpendudukmandiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukMandiri $twebpendudukmandiri)
    {
        $twebpendudukmandiri->fill($request->all());

        if ($twebpendudukmandiri->save()) {
            
            session()->flash('app_message', 'TwebPendudukMandiri successfully updated');
            return redirect()->route('tweb_penduduk_mandiri.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukMandiri');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiri  $twebpendudukmandiri
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukMandiri $twebpendudukmandiri)
    {
        if ($twebpendudukmandiri->delete()) {
                session()->flash('app_message', 'TwebPendudukMandiri successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukMandiri');
            }

        return redirect()->back();
    }
}
