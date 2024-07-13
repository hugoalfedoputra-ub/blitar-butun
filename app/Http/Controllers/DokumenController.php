<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dokumen;


/**
 * Description of DokumenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DokumenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Dokumen::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Dokumen $dokumen)
    {
        return view('pages.dokumen.show', [
                'record' =>$dokumen,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.dokumen.create', [
            'model' => new Dokumen,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Dokumen;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Dokumen saved successfully');
            return redirect()->route('dokumen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Dokumen');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Dokumen $dokumen)
    {

        return view('pages.dokumen.edit', [
            'model' => $dokumen,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Dokumen $dokumen)
    {
        $dokumen->fill($request->all());

        if ($dokumen->save()) {
            
            session()->flash('app_message', 'Dokumen successfully updated');
            return redirect()->route('dokumen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Dokumen');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Dokumen $dokumen)
    {
        if ($dokumen->delete()) {
                session()->flash('app_message', 'Dokumen successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Dokumen');
            }

        return redirect()->back();
    }
}
