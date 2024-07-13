<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisGedungModel;


/**
 * Description of InventarisGedungController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisGedungController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inventaris_gedung.index', ['records' => InventarisGedungModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisGedungModel  $inventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisGedungModel $inventarisgedungmodel)
    {
        return view('pages.inventaris_gedung.show', [
                'record' =>$inventarisgedungmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_gedung.create', [
            'model' => new InventarisGedungModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisGedungModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisGedungModel saved successfully');
            return redirect()->route('inventaris_gedung.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisGedungModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisGedungModel  $inventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisGedungModel $inventarisgedungmodel)
    {

        return view('pages.inventaris_gedung.edit', [
            'model' => $inventarisgedungmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisGedungModel  $inventarisgedungmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisGedungModel $inventarisgedungmodel)
    {
        $inventarisgedungmodel->fill($request->all());

        if ($inventarisgedungmodel->save()) {
            
            session()->flash('app_message', 'InventarisGedungModel successfully updated');
            return redirect()->route('inventaris_gedung.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisGedungModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisGedungModel  $inventarisgedungmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisGedungModel $inventarisgedungmodel)
    {
        if ($inventarisgedungmodel->delete()) {
                session()->flash('app_message', 'InventarisGedungModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisGedungModel');
            }

        return redirect()->back();
    }
}
