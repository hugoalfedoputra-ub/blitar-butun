<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Point;


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
        return view('pages.point.index', ['records' => Point::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Point  $point
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Point $point)
    {
        return view('pages.point.show', [
                'record' =>$point,
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
            'model' => new Point,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Point;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Point saved successfully');
            return redirect()->route('point.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Point');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Point  $point
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Point $point)
    {

        return view('pages.point.edit', [
            'model' => $point,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Point  $point
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Point $point)
    {
        $point->fill($request->all());

        if ($point->save()) {
            
            session()->flash('app_message', 'Point successfully updated');
            return redirect()->route('point.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Point');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Point  $point
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Point $point)
    {
        if ($point->delete()) {
                session()->flash('app_message', 'Point successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Point');
            }

        return redirect()->back();
    }
}
