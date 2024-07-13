<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PolygonModel;


/**
 * Description of PolygonController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PolygonController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.polygon.index', ['records' => PolygonModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PolygonModel  $polygonmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PolygonModel $polygonmodel)
    {
        return view('pages.polygon.show', [
                'record' =>$polygonmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.polygon.create', [
            'model' => new PolygonModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PolygonModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PolygonModel saved successfully');
            return redirect()->route('polygon.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PolygonModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PolygonModel  $polygonmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PolygonModel $polygonmodel)
    {

        return view('pages.polygon.edit', [
            'model' => $polygonmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PolygonModel  $polygonmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PolygonModel $polygonmodel)
    {
        $polygonmodel->fill($request->all());

        if ($polygonmodel->save()) {
            
            session()->flash('app_message', 'PolygonModel successfully updated');
            return redirect()->route('polygon.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PolygonModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PolygonModel  $polygonmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PolygonModel $polygonmodel)
    {
        if ($polygonmodel->delete()) {
                session()->flash('app_message', 'PolygonModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PolygonModel');
            }

        return redirect()->back();
    }
}
