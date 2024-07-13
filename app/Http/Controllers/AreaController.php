<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Area;


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
        return Area::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Area $area)
    {
        return view('pages.area.show', [
                'record' =>$area,
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
            'model' => new Area,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Area;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Area saved successfully');
            return redirect()->route('area.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Area');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Area $area)
    {

        return view('pages.area.edit', [
            'model' => $area,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Area $area)
    {
        $area->fill($request->all());

        if ($area->save()) {
            
            session()->flash('app_message', 'Area successfully updated');
            return redirect()->route('area.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Area');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Area  $area
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Area $area)
    {
        if ($area->delete()) {
                session()->flash('app_message', 'Area successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Area');
            }

        return redirect()->back();
    }
}
