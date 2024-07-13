<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;


/**
 * Description of SuratMasukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuratMasukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return SuratMasuk::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SuratMasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $suratmasuk = SuratMasuk::find($id);
        if ($suratmasuk) {
            return response()->json($suratmasuk);
        }
        return response()->json(['message' => 'SuratMasuk not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.surat_masuk.create', [
            'model' => new SuratMasuk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SuratMasuk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SuratMasuk saved successfully');
            return redirect()->route('surat_masuk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SuratMasuk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SuratMasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SuratMasuk $suratmasuk)
    {

        return view('pages.surat_masuk.edit', [
            'model' => $suratmasuk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SuratMasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SuratMasuk $suratmasuk)
    {
        $suratmasuk->fill($request->all());

        if ($suratmasuk->save()) {
            
            session()->flash('app_message', 'SuratMasuk successfully updated');
            return redirect()->route('surat_masuk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SuratMasuk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SuratMasuk  $suratmasuk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SuratMasuk $suratmasuk)
    {
        if ($suratmasuk->delete()) {
                session()->flash('app_message', 'SuratMasuk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SuratMasuk');
            }

        return redirect()->back();
    }
}
