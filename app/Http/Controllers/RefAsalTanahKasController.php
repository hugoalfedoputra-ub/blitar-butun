<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefAsalTanahKas;


/**
 * Description of RefAsalTanahKasController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefAsalTanahKasController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefAsalTanahKas::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKas  $refasaltanahkas
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refasaltanahkas = RefAsalTanahKas::find($id);
        if ($refasaltanahkas) {
            return response()->json($refasaltanahkas);
        }
        return response()->json(['message' => 'RefAsalTanahKas not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_asal_tanah_kas.create', [
            'model' => new RefAsalTanahKas,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefAsalTanahKas;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefAsalTanahKas saved successfully');
            return redirect()->route('ref_asal_tanah_kas.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefAsalTanahKas');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKas  $refasaltanahkas
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefAsalTanahKas $refasaltanahkas)
    {

        return view('pages.ref_asal_tanah_kas.edit', [
            'model' => $refasaltanahkas,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKas  $refasaltanahkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefAsalTanahKas $refasaltanahkas)
    {
        $refasaltanahkas->fill($request->all());

        if ($refasaltanahkas->save()) {
            
            session()->flash('app_message', 'RefAsalTanahKas successfully updated');
            return redirect()->route('ref_asal_tanah_kas.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefAsalTanahKas');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefAsalTanahKas  $refasaltanahkas
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefAsalTanahKas $refasaltanahkas)
    {
        if ($refasaltanahkas->delete()) {
                session()->flash('app_message', 'RefAsalTanahKas successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefAsalTanahKas');
            }

        return redirect()->back();
    }
}
