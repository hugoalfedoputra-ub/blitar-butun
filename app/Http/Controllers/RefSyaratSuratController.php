<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefSyaratSurat;


/**
 * Description of RefSyaratSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefSyaratSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefSyaratSurat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefSyaratSurat  $refsyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefSyaratSurat $refsyaratsurat)
    {
        return view('pages.ref_syarat_surat.show', [
                'record' =>$refsyaratsurat,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_syarat_surat.create', [
            'model' => new RefSyaratSurat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefSyaratSurat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefSyaratSurat saved successfully');
            return redirect()->route('ref_syarat_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefSyaratSurat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefSyaratSurat  $refsyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefSyaratSurat $refsyaratsurat)
    {

        return view('pages.ref_syarat_surat.edit', [
            'model' => $refsyaratsurat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefSyaratSurat  $refsyaratsurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefSyaratSurat $refsyaratsurat)
    {
        $refsyaratsurat->fill($request->all());

        if ($refsyaratsurat->save()) {
            
            session()->flash('app_message', 'RefSyaratSurat successfully updated');
            return redirect()->route('ref_syarat_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefSyaratSurat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefSyaratSurat  $refsyaratsurat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefSyaratSurat $refsyaratsurat)
    {
        if ($refsyaratsurat->delete()) {
                session()->flash('app_message', 'RefSyaratSurat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefSyaratSurat');
            }

        return redirect()->back();
    }
}
