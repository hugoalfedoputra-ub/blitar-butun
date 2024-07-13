<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterInventarisModel;


/**
 * Description of MasterInventarisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MasterInventarisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.master_inventaris.index', ['records' => MasterInventarisModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MasterInventarisModel  $masterinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MasterInventarisModel $masterinventarismodel)
    {
        return view('pages.master_inventaris.show', [
                'record' =>$masterinventarismodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.master_inventaris.create', [
            'model' => new MasterInventarisModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MasterInventarisModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MasterInventarisModel saved successfully');
            return redirect()->route('master_inventaris.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MasterInventarisModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MasterInventarisModel  $masterinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MasterInventarisModel $masterinventarismodel)
    {

        return view('pages.master_inventaris.edit', [
            'model' => $masterinventarismodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MasterInventarisModel  $masterinventarismodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MasterInventarisModel $masterinventarismodel)
    {
        $masterinventarismodel->fill($request->all());

        if ($masterinventarismodel->save()) {
            
            session()->flash('app_message', 'MasterInventarisModel successfully updated');
            return redirect()->route('master_inventaris.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MasterInventarisModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MasterInventarisModel  $masterinventarismodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MasterInventarisModel $masterinventarismodel)
    {
        if ($masterinventarismodel->delete()) {
                session()->flash('app_message', 'MasterInventarisModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MasterInventarisModel');
            }

        return redirect()->back();
    }
}
