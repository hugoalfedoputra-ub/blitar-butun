<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisTanahModel;


/**
 * Description of InventarisTanahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisTanahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inventaris_tanah.index', ['records' => InventarisTanahModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisTanahModel  $inventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisTanahModel $inventaristanahmodel)
    {
        return view('pages.inventaris_tanah.show', [
                'record' =>$inventaristanahmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_tanah.create', [
            'model' => new InventarisTanahModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisTanahModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisTanahModel saved successfully');
            return redirect()->route('inventaris_tanah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisTanahModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisTanahModel  $inventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisTanahModel $inventaristanahmodel)
    {

        return view('pages.inventaris_tanah.edit', [
            'model' => $inventaristanahmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisTanahModel  $inventaristanahmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisTanahModel $inventaristanahmodel)
    {
        $inventaristanahmodel->fill($request->all());

        if ($inventaristanahmodel->save()) {
            
            session()->flash('app_message', 'InventarisTanahModel successfully updated');
            return redirect()->route('inventaris_tanah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisTanahModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisTanahModel  $inventaristanahmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisTanahModel $inventaristanahmodel)
    {
        if ($inventaristanahmodel->delete()) {
                session()->flash('app_message', 'InventarisTanahModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisTanahModel');
            }

        return redirect()->back();
    }
}
