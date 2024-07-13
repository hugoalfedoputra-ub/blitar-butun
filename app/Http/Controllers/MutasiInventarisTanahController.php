<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisTanah;
use App\Models\InventarisTanah;


/**
 * Description of MutasiInventarisTanahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisTanahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_inventaris_tanah.index', ['records' => MutasiInventarisTanah::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanah  $mutasiinventaristanah
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisTanah $mutasiinventaristanah)
    {
        return view('pages.mutasi_inventaris_tanah.show', [
                'record' =>$mutasiinventaristanah,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_tanah = InventarisTanah::all(['id']);

        return view('pages.mutasi_inventaris_tanah.create', [
            'model' => new MutasiInventarisTanah,
			"inventaris_tanah" => $inventaris_tanah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisTanah;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisTanah saved successfully');
            return redirect()->route('mutasi_inventaris_tanah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisTanah');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanah  $mutasiinventaristanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisTanah $mutasiinventaristanah)
    {
		$inventaris_tanah = InventarisTanah::all(['id']);

        return view('pages.mutasi_inventaris_tanah.edit', [
            'model' => $mutasiinventaristanah,
			"inventaris_tanah" => $inventaris_tanah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanah  $mutasiinventaristanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisTanah $mutasiinventaristanah)
    {
        $mutasiinventaristanah->fill($request->all());

        if ($mutasiinventaristanah->save()) {
            
            session()->flash('app_message', 'MutasiInventarisTanah successfully updated');
            return redirect()->route('mutasi_inventaris_tanah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisTanah');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanah  $mutasiinventaristanah
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisTanah $mutasiinventaristanah)
    {
        if ($mutasiinventaristanah->delete()) {
                session()->flash('app_message', 'MutasiInventarisTanah successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisTanah');
            }

        return redirect()->back();
    }
}
