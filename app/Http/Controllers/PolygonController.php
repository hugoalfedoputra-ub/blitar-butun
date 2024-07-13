<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Polygon;


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
        return Polygon::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Polygon  $polygon
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $polygon = Polygon::find($id);
        if ($polygon) {
            return response()->json($polygon);
        }
        return response()->json(['message' => 'Polygon not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.polygon.create', [
            'model' => new Polygon,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Polygon;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Polygon saved successfully');
            return redirect()->route('polygon.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Polygon');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Polygon  $polygon
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Polygon $polygon)
    {

        return view('pages.polygon.edit', [
            'model' => $polygon,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Polygon  $polygon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Polygon $polygon)
    {
        $polygon->fill($request->all());

        if ($polygon->save()) {
            
            session()->flash('app_message', 'Polygon successfully updated');
            return redirect()->route('polygon.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Polygon');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Polygon  $polygon
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Polygon $polygon)
    {
        if ($polygon->delete()) {
                session()->flash('app_message', 'Polygon successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Polygon');
            }

        return redirect()->back();
    }
}
