<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisAssetModel;
use App\Models\InventarisAsset;


/**
 * Description of MutasiInventarisAssetController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisAssetController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.mutasi_inventaris_asset.index', ['records' => MutasiInventarisAssetModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAssetModel  $mutasiinventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisAssetModel $mutasiinventarisassetmodel)
    {
        return view('pages.mutasi_inventaris_asset.show', [
                'record' =>$mutasiinventarisassetmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_asset = InventarisAsset::all(['id']);

        return view('pages.mutasi_inventaris_asset.create', [
            'model' => new MutasiInventarisAssetModel,
			"inventaris_asset" => $inventaris_asset,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisAssetModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisAssetModel saved successfully');
            return redirect()->route('mutasi_inventaris_asset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisAssetModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAssetModel  $mutasiinventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisAssetModel $mutasiinventarisassetmodel)
    {
		$inventaris_asset = InventarisAsset::all(['id']);

        return view('pages.mutasi_inventaris_asset.edit', [
            'model' => $mutasiinventarisassetmodel,
			"inventaris_asset" => $inventaris_asset,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAssetModel  $mutasiinventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisAssetModel $mutasiinventarisassetmodel)
    {
        $mutasiinventarisassetmodel->fill($request->all());

        if ($mutasiinventarisassetmodel->save()) {
            
            session()->flash('app_message', 'MutasiInventarisAssetModel successfully updated');
            return redirect()->route('mutasi_inventaris_asset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisAssetModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAssetModel  $mutasiinventarisassetmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisAssetModel $mutasiinventarisassetmodel)
    {
        if ($mutasiinventarisassetmodel->delete()) {
                session()->flash('app_message', 'MutasiInventarisAssetModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisAssetModel');
            }

        return redirect()->back();
    }
}
