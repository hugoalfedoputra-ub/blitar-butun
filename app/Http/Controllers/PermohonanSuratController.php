<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermohonanSurat;


/**
 * Description of PermohonanSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PermohonanSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PermohonanSurat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PermohonanSurat  $permohonansurat
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $permohonansurat = PermohonanSurat::find($id);
        if ($permohonansurat) {
            return response()->json($permohonansurat);
        }
        return response()->json(['message' => 'PermohonanSurat not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.permohonan_surat.create', [
            'model' => new PermohonanSurat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PermohonanSurat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PermohonanSurat saved successfully');
            return redirect()->route('permohonan_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PermohonanSurat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PermohonanSurat  $permohonansurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PermohonanSurat $permohonansurat)
    {

        return view('pages.permohonan_surat.edit', [
            'model' => $permohonansurat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PermohonanSurat  $permohonansurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PermohonanSurat $permohonansurat)
    {
        $permohonansurat->fill($request->all());

        if ($permohonansurat->save()) {
            
            session()->flash('app_message', 'PermohonanSurat successfully updated');
            return redirect()->route('permohonan_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PermohonanSurat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PermohonanSurat  $permohonansurat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PermohonanSurat $permohonansurat)
    {
        if ($permohonansurat->delete()) {
                session()->flash('app_message', 'PermohonanSurat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PermohonanSurat');
            }

        return redirect()->back();
    }
}
