<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AreaModel;


/**
 * Description of AreaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AreaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.area.index', ['records' => AreaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AreaModel  $areamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AreaModel $areamodel)
    {
        return view('pages.area.show', [
                'record' =>$areamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.area.create', [
            'model' => new AreaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AreaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AreaModel saved successfully');
            return redirect()->route('area.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AreaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AreaModel  $areamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AreaModel $areamodel)
    {

        return view('pages.area.edit', [
            'model' => $areamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AreaModel  $areamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AreaModel $areamodel)
    {
        $areamodel->fill($request->all());

        if ($areamodel->save()) {
            
            session()->flash('app_message', 'AreaModel successfully updated');
            return redirect()->route('area.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AreaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AreaModel  $areamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AreaModel $areamodel)
    {
        if ($areamodel->delete()) {
                session()->flash('app_message', 'AreaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AreaModel');
            }

        return redirect()->back();
    }
}
