<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisJalanModel;
use App\Models\InventarisJalan;


/**
 * Description of MutasiInventarisJalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisJalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_inventaris_jalan.index', ['records' => MutasiInventarisJalanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalanModel  $mutasiinventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisJalanModel $mutasiinventarisjalanmodel)
    {
        return view('pages.mutasi_inventaris_jalan.show', [
                'record' =>$mutasiinventarisjalanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_jalan = InventarisJalan::all(['id']);

        return view('pages.mutasi_inventaris_jalan.create', [
            'model' => new MutasiInventarisJalanModel,
			"inventaris_jalan" => $inventaris_jalan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisJalanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisJalanModel saved successfully');
            return redirect()->route('mutasi_inventaris_jalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisJalanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalanModel  $mutasiinventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisJalanModel $mutasiinventarisjalanmodel)
    {
		$inventaris_jalan = InventarisJalan::all(['id']);

        return view('pages.mutasi_inventaris_jalan.edit', [
            'model' => $mutasiinventarisjalanmodel,
			"inventaris_jalan" => $inventaris_jalan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalanModel  $mutasiinventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisJalanModel $mutasiinventarisjalanmodel)
    {
        $mutasiinventarisjalanmodel->fill($request->all());

        if ($mutasiinventarisjalanmodel->save()) {
            
            session()->flash('app_message', 'MutasiInventarisJalanModel successfully updated');
            return redirect()->route('mutasi_inventaris_jalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisJalanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalanModel  $mutasiinventarisjalanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisJalanModel $mutasiinventarisjalanmodel)
    {
        if ($mutasiinventarisjalanmodel->delete()) {
                session()->flash('app_message', 'MutasiInventarisJalanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisJalanModel');
            }

        return redirect()->back();
    }
}
