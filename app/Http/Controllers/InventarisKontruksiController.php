<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisKontruksiModel;


/**
 * Description of InventarisKontruksiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisKontruksiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inventaris_kontruksi.index', ['records' => InventarisKontruksiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisKontruksiModel  $inventariskontruksimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisKontruksiModel $inventariskontruksimodel)
    {
        return view('pages.inventaris_kontruksi.show', [
                'record' =>$inventariskontruksimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_kontruksi.create', [
            'model' => new InventarisKontruksiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisKontruksiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisKontruksiModel saved successfully');
            return redirect()->route('inventaris_kontruksi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisKontruksiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisKontruksiModel  $inventariskontruksimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisKontruksiModel $inventariskontruksimodel)
    {

        return view('pages.inventaris_kontruksi.edit', [
            'model' => $inventariskontruksimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisKontruksiModel  $inventariskontruksimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisKontruksiModel $inventariskontruksimodel)
    {
        $inventariskontruksimodel->fill($request->all());

        if ($inventariskontruksimodel->save()) {
            
            session()->flash('app_message', 'InventarisKontruksiModel successfully updated');
            return redirect()->route('inventaris_kontruksi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisKontruksiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisKontruksiModel  $inventariskontruksimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisKontruksiModel $inventariskontruksimodel)
    {
        if ($inventariskontruksimodel->delete()) {
                session()->flash('app_message', 'InventarisKontruksiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisKontruksiModel');
            }

        return redirect()->back();
    }
}
