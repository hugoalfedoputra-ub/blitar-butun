<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembangunanRefDokumentasiModel;


/**
 * Description of PembangunanRefDokumentasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PembangunanRefDokumentasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pembangunan_ref_dokumentasi.index', ['records' => PembangunanRefDokumentasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasiModel  $pembangunanrefdokumentasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PembangunanRefDokumentasiModel $pembangunanrefdokumentasimodel)
    {
        return view('pages.pembangunan_ref_dokumentasi.show', [
                'record' =>$pembangunanrefdokumentasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pembangunan_ref_dokumentasi.create', [
            'model' => new PembangunanRefDokumentasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PembangunanRefDokumentasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PembangunanRefDokumentasiModel saved successfully');
            return redirect()->route('pembangunan_ref_dokumentasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PembangunanRefDokumentasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasiModel  $pembangunanrefdokumentasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PembangunanRefDokumentasiModel $pembangunanrefdokumentasimodel)
    {

        return view('pages.pembangunan_ref_dokumentasi.edit', [
            'model' => $pembangunanrefdokumentasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasiModel  $pembangunanrefdokumentasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PembangunanRefDokumentasiModel $pembangunanrefdokumentasimodel)
    {
        $pembangunanrefdokumentasimodel->fill($request->all());

        if ($pembangunanrefdokumentasimodel->save()) {
            
            session()->flash('app_message', 'PembangunanRefDokumentasiModel successfully updated');
            return redirect()->route('pembangunan_ref_dokumentasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PembangunanRefDokumentasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasiModel  $pembangunanrefdokumentasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PembangunanRefDokumentasiModel $pembangunanrefdokumentasimodel)
    {
        if ($pembangunanrefdokumentasimodel->delete()) {
                session()->flash('app_message', 'PembangunanRefDokumentasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PembangunanRefDokumentasiModel');
            }

        return redirect()->back();
    }
}
