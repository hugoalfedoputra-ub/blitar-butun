<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefSinkronisasi;


/**
 * Description of RefSinkronisasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefSinkronisasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefSinkronisasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefSinkronisasi  $refsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refsinkronisasi = RefSinkronisasi::find($id);
        if ($refsinkronisasi) {
            return response()->json($refsinkronisasi);
        }
        return response()->json(['message' => 'RefSinkronisasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_sinkronisasi.create', [
            'model' => new RefSinkronisasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefSinkronisasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefSinkronisasi saved successfully');
            return redirect()->route('ref_sinkronisasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefSinkronisasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefSinkronisasi  $refsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefSinkronisasi $refsinkronisasi)
    {

        return view('pages.ref_sinkronisasi.edit', [
            'model' => $refsinkronisasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefSinkronisasi  $refsinkronisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefSinkronisasi $refsinkronisasi)
    {
        $refsinkronisasi->fill($request->all());

        if ($refsinkronisasi->save()) {
            
            session()->flash('app_message', 'RefSinkronisasi successfully updated');
            return redirect()->route('ref_sinkronisasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefSinkronisasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefSinkronisasi  $refsinkronisasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefSinkronisasi $refsinkronisasi)
    {
        if ($refsinkronisasi->delete()) {
                session()->flash('app_message', 'RefSinkronisasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefSinkronisasi');
            }

        return redirect()->back();
    }
}
