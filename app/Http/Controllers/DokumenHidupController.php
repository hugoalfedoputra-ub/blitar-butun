<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DokumenHidup;


/**
 * Description of DokumenHidupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DokumenHidupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.dokumen_hidup.index', ['records' => DokumenHidup::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenHidup  $dokumenhidup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DokumenHidup $dokumenhidup)
    {
        return view('pages.dokumen_hidup.show', [
                'record' =>$dokumenhidup,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.dokumen_hidup.create', [
            'model' => new DokumenHidup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DokumenHidup;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DokumenHidup saved successfully');
            return redirect()->route('dokumen_hidup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DokumenHidup');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DokumenHidup  $dokumenhidup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DokumenHidup $dokumenhidup)
    {

        return view('pages.dokumen_hidup.edit', [
            'model' => $dokumenhidup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DokumenHidup  $dokumenhidup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DokumenHidup $dokumenhidup)
    {
        $dokumenhidup->fill($request->all());

        if ($dokumenhidup->save()) {
            
            session()->flash('app_message', 'DokumenHidup successfully updated');
            return redirect()->route('dokumen_hidup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DokumenHidup');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DokumenHidup  $dokumenhidup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DokumenHidup $dokumenhidup)
    {
        if ($dokumenhidup->delete()) {
                session()->flash('app_message', 'DokumenHidup successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DokumenHidup');
            }

        return redirect()->back();
    }
}
