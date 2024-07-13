<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisPeralatanModel;
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
        return view('pages.mutasi_inventaris_peralatan.index', ['records' => MutasiInventarisPeralatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatanModel  $mutasiinventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisPeralatanModel $mutasiinventarisperalatanmodel)
    {
        return view('pages.mutasi_inventaris_peralatan.show', [
                'record' =>$mutasiinventarisperalatanmodel,
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
            'model' => new MutasiInventarisPeralatanModel,
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
        $model=new MutasiInventarisPeralatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisPeralatanModel saved successfully');
            return redirect()->route('mutasi_inventaris_peralatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisPeralatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatanModel  $mutasiinventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisPeralatanModel $mutasiinventarisperalatanmodel)
    {
		$inventaris_peralatan = InventarisPeralatan::all(['id']);

        return view('pages.mutasi_inventaris_peralatan.edit', [
            'model' => $mutasiinventarisperalatanmodel,
			"inventaris_peralatan" => $inventaris_peralatan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatanModel  $mutasiinventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisPeralatanModel $mutasiinventarisperalatanmodel)
    {
        $mutasiinventarisperalatanmodel->fill($request->all());

        if ($mutasiinventarisperalatanmodel->save()) {
            
            session()->flash('app_message', 'MutasiInventarisPeralatanModel successfully updated');
            return redirect()->route('mutasi_inventaris_peralatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisPeralatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisPeralatanModel  $mutasiinventarisperalatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisPeralatanModel $mutasiinventarisperalatanmodel)
    {
        if ($mutasiinventarisperalatanmodel->delete()) {
                session()->flash('app_message', 'MutasiInventarisPeralatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisPeralatanModel');
            }

        return redirect()->back();
    }
}
