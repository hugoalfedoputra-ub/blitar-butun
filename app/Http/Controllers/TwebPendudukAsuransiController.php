<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukAsuransi;


/**
 * Description of TwebPendudukAsuransiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukAsuransiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukAsuransi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransi  $twebpendudukasuransi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebpendudukasuransi = TwebPendudukAsuransi::find($id);
        if ($twebpendudukasuransi) {
            return response()->json($twebpendudukasuransi);
        }
        return response()->json(['message' => 'TwebPendudukAsuransi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_asuransi.create', [
            'model' => new TwebPendudukAsuransi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukAsuransi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukAsuransi saved successfully');
            return redirect()->route('tweb_penduduk_asuransi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukAsuransi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransi  $twebpendudukasuransi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukAsuransi $twebpendudukasuransi)
    {

        return view('pages.tweb_penduduk_asuransi.edit', [
            'model' => $twebpendudukasuransi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransi  $twebpendudukasuransi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukAsuransi $twebpendudukasuransi)
    {
        $twebpendudukasuransi->fill($request->all());

        if ($twebpendudukasuransi->save()) {
            
            session()->flash('app_message', 'TwebPendudukAsuransi successfully updated');
            return redirect()->route('tweb_penduduk_asuransi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukAsuransi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAsuransi  $twebpendudukasuransi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukAsuransi $twebpendudukasuransi)
    {
        if ($twebpendudukasuransi->delete()) {
                session()->flash('app_message', 'TwebPendudukAsuransi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukAsuransi');
            }

        return redirect()->back();
    }
}
