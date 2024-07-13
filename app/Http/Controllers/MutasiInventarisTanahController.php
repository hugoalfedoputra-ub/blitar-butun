<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisTanahModel;
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
        return view('pages.mutasi_inventaris_tanah.index', ['records' => MutasiInventarisTanahModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanahModel  $mutasiinventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisTanahModel $mutasiinventaristanahmodel)
    {
        return view('pages.mutasi_inventaris_tanah.show', [
                'record' =>$mutasiinventaristanahmodel,
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
            'model' => new MutasiInventarisTanahModel,
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
        $model=new MutasiInventarisTanahModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisTanahModel saved successfully');
            return redirect()->route('mutasi_inventaris_tanah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisTanahModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanahModel  $mutasiinventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisTanahModel $mutasiinventaristanahmodel)
    {
		$inventaris_tanah = InventarisTanah::all(['id']);

        return view('pages.mutasi_inventaris_tanah.edit', [
            'model' => $mutasiinventaristanahmodel,
			"inventaris_tanah" => $inventaris_tanah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanahModel  $mutasiinventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisTanahModel $mutasiinventaristanahmodel)
    {
        $mutasiinventaristanahmodel->fill($request->all());

        if ($mutasiinventaristanahmodel->save()) {
            
            session()->flash('app_message', 'MutasiInventarisTanahModel successfully updated');
            return redirect()->route('mutasi_inventaris_tanah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisTanahModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisTanahModel  $mutasiinventaristanahmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisTanahModel $mutasiinventaristanahmodel)
    {
        if ($mutasiinventaristanahmodel->delete()) {
                session()->flash('app_message', 'MutasiInventarisTanahModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisTanahModel');
            }

        return redirect()->back();
    }
}
