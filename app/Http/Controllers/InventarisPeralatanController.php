<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisPeralatanModel;


/**
 * Description of InventarisPeralatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisPeralatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inventaris_peralatan.index', ['records' => InventarisPeralatanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisPeralatanModel  $inventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisPeralatanModel $inventarisperalatanmodel)
    {
        return view('pages.inventaris_peralatan.show', [
                'record' =>$inventarisperalatanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_peralatan.create', [
            'model' => new InventarisPeralatanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisPeralatanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisPeralatanModel saved successfully');
            return redirect()->route('inventaris_peralatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisPeralatanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisPeralatanModel  $inventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisPeralatanModel $inventarisperalatanmodel)
    {

        return view('pages.inventaris_peralatan.edit', [
            'model' => $inventarisperalatanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisPeralatanModel  $inventarisperalatanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisPeralatanModel $inventarisperalatanmodel)
    {
        $inventarisperalatanmodel->fill($request->all());

        if ($inventarisperalatanmodel->save()) {
            
            session()->flash('app_message', 'InventarisPeralatanModel successfully updated');
            return redirect()->route('inventaris_peralatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisPeralatanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisPeralatanModel  $inventarisperalatanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisPeralatanModel $inventarisperalatanmodel)
    {
        if ($inventarisperalatanmodel->delete()) {
                session()->flash('app_message', 'InventarisPeralatanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisPeralatanModel');
            }

        return redirect()->back();
    }
}
