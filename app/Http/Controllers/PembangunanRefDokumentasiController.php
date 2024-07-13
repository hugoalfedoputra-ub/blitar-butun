<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PembangunanRefDokumentasi;


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
        return PembangunanRefDokumentasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasi  $pembangunanrefdokumentasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PembangunanRefDokumentasi $pembangunanrefdokumentasi)
    {
        return view('pages.pembangunan_ref_dokumentasi.show', [
                'record' =>$pembangunanrefdokumentasi,
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
            'model' => new PembangunanRefDokumentasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PembangunanRefDokumentasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PembangunanRefDokumentasi saved successfully');
            return redirect()->route('pembangunan_ref_dokumentasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PembangunanRefDokumentasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasi  $pembangunanrefdokumentasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PembangunanRefDokumentasi $pembangunanrefdokumentasi)
    {

        return view('pages.pembangunan_ref_dokumentasi.edit', [
            'model' => $pembangunanrefdokumentasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasi  $pembangunanrefdokumentasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PembangunanRefDokumentasi $pembangunanrefdokumentasi)
    {
        $pembangunanrefdokumentasi->fill($request->all());

        if ($pembangunanrefdokumentasi->save()) {
            
            session()->flash('app_message', 'PembangunanRefDokumentasi successfully updated');
            return redirect()->route('pembangunan_ref_dokumentasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PembangunanRefDokumentasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PembangunanRefDokumentasi  $pembangunanrefdokumentasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PembangunanRefDokumentasi $pembangunanrefdokumentasi)
    {
        if ($pembangunanrefdokumentasi->delete()) {
                session()->flash('app_message', 'PembangunanRefDokumentasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PembangunanRefDokumentasi');
            }

        return redirect()->back();
    }
}
