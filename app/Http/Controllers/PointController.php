<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PointModel;


/**
 * Description of PointController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PointController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.point.index', ['records' => PointModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PointModel  $pointmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PointModel $pointmodel)
    {
        return view('pages.point.show', [
                'record' =>$pointmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.point.create', [
            'model' => new PointModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PointModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PointModel saved successfully');
            return redirect()->route('point.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PointModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PointModel  $pointmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PointModel $pointmodel)
    {

        return view('pages.point.edit', [
            'model' => $pointmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PointModel  $pointmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PointModel $pointmodel)
    {
        $pointmodel->fill($request->all());

        if ($pointmodel->save()) {
            
            session()->flash('app_message', 'PointModel successfully updated');
            return redirect()->route('point.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PointModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PointModel  $pointmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PointModel $pointmodel)
    {
        if ($pointmodel->delete()) {
                session()->flash('app_message', 'PointModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PointModel');
            }

        return redirect()->back();
    }
}
