<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisJalanModel;


/**
 * Description of InventarisJalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisJalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inventaris_jalan.index', ['records' => InventarisJalanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisJalanModel  $inventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisJalanModel $inventarisjalanmodel)
    {
        return view('pages.inventaris_jalan.show', [
                'record' =>$inventarisjalanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_jalan.create', [
            'model' => new InventarisJalanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisJalanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisJalanModel saved successfully');
            return redirect()->route('inventaris_jalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisJalanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisJalanModel  $inventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisJalanModel $inventarisjalanmodel)
    {

        return view('pages.inventaris_jalan.edit', [
            'model' => $inventarisjalanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisJalanModel  $inventarisjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisJalanModel $inventarisjalanmodel)
    {
        $inventarisjalanmodel->fill($request->all());

        if ($inventarisjalanmodel->save()) {
            
            session()->flash('app_message', 'InventarisJalanModel successfully updated');
            return redirect()->route('inventaris_jalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisJalanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisJalanModel  $inventarisjalanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisJalanModel $inventarisjalanmodel)
    {
        if ($inventarisjalanmodel->delete()) {
                session()->flash('app_message', 'InventarisJalanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisJalanModel');
            }

        return redirect()->back();
    }
}
