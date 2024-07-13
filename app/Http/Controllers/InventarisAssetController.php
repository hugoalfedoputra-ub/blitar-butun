<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisAssetModel;


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
        return view('pages.inventaris_asset.index', ['records' => InventarisAssetModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisAssetModel  $inventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisAssetModel $inventarisassetmodel)
    {
        return view('pages.inventaris_asset.show', [
                'record' =>$inventarisassetmodel,
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
            'model' => new InventarisAssetModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisAssetModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisAssetModel saved successfully');
            return redirect()->route('inventaris_asset.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisAssetModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisAssetModel  $inventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisAssetModel $inventarisassetmodel)
    {

        return view('pages.inventaris_asset.edit', [
            'model' => $inventarisassetmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisAssetModel  $inventarisassetmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisAssetModel $inventarisassetmodel)
    {
        $inventarisassetmodel->fill($request->all());

        if ($inventarisassetmodel->save()) {
            
            session()->flash('app_message', 'InventarisAssetModel successfully updated');
            return redirect()->route('inventaris_asset.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisAssetModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisAssetModel  $inventarisassetmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisAssetModel $inventarisassetmodel)
    {
        if ($inventarisassetmodel->delete()) {
                session()->flash('app_message', 'InventarisAssetModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisAssetModel');
            }

        return redirect()->back();
    }
}
