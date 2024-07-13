<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi;


/**
 * Description of LokasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LokasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Lokasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $lokasi = Lokasi::find($id);
        if ($lokasi) {
            return response()->json($lokasi);
        }
        return response()->json(['message' => 'Lokasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.lokasi.create', [
            'model' => new Lokasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Lokasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Lokasi saved successfully');
            return redirect()->route('lokasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Lokasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Lokasi $lokasi)
    {

        return view('pages.lokasi.edit', [
            'model' => $lokasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Lokasi $lokasi)
    {
        $lokasi->fill($request->all());

        if ($lokasi->save()) {
            
            session()->flash('app_message', 'Lokasi successfully updated');
            return redirect()->route('lokasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Lokasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Lokasi $lokasi)
    {
        if ($lokasi->delete()) {
                session()->flash('app_message', 'Lokasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Lokasi');
            }

        return redirect()->back();
    }
}
