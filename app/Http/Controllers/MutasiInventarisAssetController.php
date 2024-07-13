<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisAsset;
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
        return MutasiInventarisAsset::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAsset  $mutasiinventarisasset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MutasiInventarisAsset $mutasiinventarisasset)
    {
        return view('pages.mutasi_inventaris_asset.show', [
                'record' =>$mutasiinventarisasset,
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
            'model' => new MutasiInventarisAsset,
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
        $model=new MutasiInventarisAsset;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisAsset saved successfully');
            return redirect()->route('mutasi_inventaris_asset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisAsset');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAsset  $mutasiinventarisasset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisAsset $mutasiinventarisasset)
    {
		$inventaris_asset = InventarisAsset::all(['id']);

        return view('pages.mutasi_inventaris_asset.edit', [
            'model' => $mutasiinventarisasset,
			"inventaris_asset" => $inventaris_asset,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAsset  $mutasiinventarisasset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisAsset $mutasiinventarisasset)
    {
        $mutasiinventarisasset->fill($request->all());

        if ($mutasiinventarisasset->save()) {
            
            session()->flash('app_message', 'MutasiInventarisAsset successfully updated');
            return redirect()->route('mutasi_inventaris_asset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisAsset');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisAsset  $mutasiinventarisasset
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisAsset $mutasiinventarisasset)
    {
        if ($mutasiinventarisasset->delete()) {
                session()->flash('app_message', 'MutasiInventarisAsset successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisAsset');
            }

        return redirect()->back();
    }
}
