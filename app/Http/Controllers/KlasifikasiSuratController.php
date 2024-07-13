<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KlasifikasiSuratModel;


/**
 * Description of KlasifikasiSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KlasifikasiSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.klasifikasi_surat.index', ['records' => KlasifikasiSuratModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KlasifikasiSuratModel  $klasifikasisuratmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KlasifikasiSuratModel $klasifikasisuratmodel)
    {
        return view('pages.klasifikasi_surat.show', [
                'record' =>$klasifikasisuratmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.klasifikasi_surat.create', [
            'model' => new KlasifikasiSuratModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KlasifikasiSuratModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KlasifikasiSuratModel saved successfully');
            return redirect()->route('klasifikasi_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KlasifikasiSuratModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KlasifikasiSuratModel  $klasifikasisuratmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KlasifikasiSuratModel $klasifikasisuratmodel)
    {

        return view('pages.klasifikasi_surat.edit', [
            'model' => $klasifikasisuratmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KlasifikasiSuratModel  $klasifikasisuratmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KlasifikasiSuratModel $klasifikasisuratmodel)
    {
        $klasifikasisuratmodel->fill($request->all());

        if ($klasifikasisuratmodel->save()) {
            
            session()->flash('app_message', 'KlasifikasiSuratModel successfully updated');
            return redirect()->route('klasifikasi_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KlasifikasiSuratModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KlasifikasiSuratModel  $klasifikasisuratmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KlasifikasiSuratModel $klasifikasisuratmodel)
    {
        if ($klasifikasisuratmodel->delete()) {
                session()->flash('app_message', 'KlasifikasiSuratModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KlasifikasiSuratModel');
            }

        return redirect()->back();
    }
}
