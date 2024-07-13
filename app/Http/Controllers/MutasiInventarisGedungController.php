<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisGedungModel;
use App\Models\InventarisGedung;


/**
 * Description of MutasiInventarisGedungController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisGedungController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_inventaris_gedung.index', ['records' => MutasiInventarisGedungModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedungModel  $mutasiinventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisGedungModel $mutasiinventarisgedungmodel)
    {
        return view('pages.mutasi_inventaris_gedung.show', [
                'record' =>$mutasiinventarisgedungmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_gedung = InventarisGedung::all(['id']);

        return view('pages.mutasi_inventaris_gedung.create', [
            'model' => new MutasiInventarisGedungModel,
			"inventaris_gedung" => $inventaris_gedung,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisGedungModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisGedungModel saved successfully');
            return redirect()->route('mutasi_inventaris_gedung.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisGedungModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedungModel  $mutasiinventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisGedungModel $mutasiinventarisgedungmodel)
    {
		$inventaris_gedung = InventarisGedung::all(['id']);

        return view('pages.mutasi_inventaris_gedung.edit', [
            'model' => $mutasiinventarisgedungmodel,
			"inventaris_gedung" => $inventaris_gedung,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedungModel  $mutasiinventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisGedungModel $mutasiinventarisgedungmodel)
    {
        $mutasiinventarisgedungmodel->fill($request->all());

        if ($mutasiinventarisgedungmodel->save()) {
            
            session()->flash('app_message', 'MutasiInventarisGedungModel successfully updated');
            return redirect()->route('mutasi_inventaris_gedung.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisGedungModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedungModel  $mutasiinventarisgedungmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisGedungModel $mutasiinventarisgedungmodel)
    {
        if ($mutasiinventarisgedungmodel->delete()) {
                session()->flash('app_message', 'MutasiInventarisGedungModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisGedungModel');
            }

        return redirect()->back();
    }
}
