<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisPeralatan;
use App\Models\InventarisPeralatan;


/**
 * Description of MutasiInventarisPeralatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisPeralatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_inventaris_peralatan.index', ['records' => MutasiInventarisPeralatan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatan  $mutasiinventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisPeralatan $mutasiinventarisperalatan)
    {
        return view('pages.mutasi_inventaris_peralatan.show', [
                'record' =>$mutasiinventarisperalatan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_peralatan = InventarisPeralatan::all(['id']);

        return view('pages.mutasi_inventaris_peralatan.create', [
            'model' => new MutasiInventarisPeralatan,
			"inventaris_peralatan" => $inventaris_peralatan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisPeralatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisPeralatan saved successfully');
            return redirect()->route('mutasi_inventaris_peralatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisPeralatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatan  $mutasiinventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisPeralatan $mutasiinventarisperalatan)
    {
		$inventaris_peralatan = InventarisPeralatan::all(['id']);

        return view('pages.mutasi_inventaris_peralatan.edit', [
            'model' => $mutasiinventarisperalatan,
			"inventaris_peralatan" => $inventaris_peralatan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatan  $mutasiinventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisPeralatan $mutasiinventarisperalatan)
    {
        $mutasiinventarisperalatan->fill($request->all());

        if ($mutasiinventarisperalatan->save()) {
            
            session()->flash('app_message', 'MutasiInventarisPeralatan successfully updated');
            return redirect()->route('mutasi_inventaris_peralatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisPeralatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatan  $mutasiinventarisperalatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisPeralatan $mutasiinventarisperalatan)
    {
        if ($mutasiinventarisperalatan->delete()) {
                session()->flash('app_message', 'MutasiInventarisPeralatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisPeralatan');
            }

        return redirect()->back();
    }
}
