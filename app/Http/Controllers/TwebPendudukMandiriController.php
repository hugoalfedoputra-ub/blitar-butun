<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukMandiriModel;
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
        return view('pages.tweb_penduduk_mandiri.index', ['records' => TwebPendudukMandiriModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiriModel  $twebpendudukmandirimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukMandiriModel $twebpendudukmandirimodel)
    {
        return view('pages.tweb_penduduk_mandiri.show', [
                'record' =>$twebpendudukmandirimodel,
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
            'model' => new TwebPendudukMandiriModel,
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
        $model=new TwebPendudukMandiriModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukMandiriModel saved successfully');
            return redirect()->route('tweb_penduduk_mandiri.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukMandiriModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiriModel  $twebpendudukmandirimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukMandiriModel $twebpendudukmandirimodel)
    {
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.tweb_penduduk_mandiri.edit', [
            'model' => $twebpendudukmandirimodel,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiriModel  $twebpendudukmandirimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukMandiriModel $twebpendudukmandirimodel)
    {
        $twebpendudukmandirimodel->fill($request->all());

        if ($twebpendudukmandirimodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukMandiriModel successfully updated');
            return redirect()->route('tweb_penduduk_mandiri.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukMandiriModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMandiriModel  $twebpendudukmandirimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukMandiriModel $twebpendudukmandirimodel)
    {
        if ($twebpendudukmandirimodel->delete()) {
                session()->flash('app_message', 'TwebPendudukMandiriModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukMandiriModel');
            }

        return redirect()->back();
    }
}
