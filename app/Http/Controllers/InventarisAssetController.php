<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisAsset;


/**
 * Description of InventarisAssetController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisAssetController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisAsset::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisAsset  $inventarisasset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisAsset $inventarisasset)
    {
        return view('pages.inventaris_asset.show', [
                'record' =>$inventarisasset,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_asset.create', [
            'model' => new InventarisAsset,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisAsset;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisAsset saved successfully');
            return redirect()->route('inventaris_asset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisAsset');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisAsset  $inventarisasset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisAsset $inventarisasset)
    {

        return view('pages.inventaris_asset.edit', [
            'model' => $inventarisasset,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisAsset  $inventarisasset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisAsset $inventarisasset)
    {
        $inventarisasset->fill($request->all());

        if ($inventarisasset->save()) {
            
            session()->flash('app_message', 'InventarisAsset successfully updated');
            return redirect()->route('inventaris_asset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisAsset');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisAsset  $inventarisasset
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisAsset $inventarisasset)
    {
        if ($inventarisasset->delete()) {
                session()->flash('app_message', 'InventarisAsset successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisAsset');
            }

        return redirect()->back();
    }
}
