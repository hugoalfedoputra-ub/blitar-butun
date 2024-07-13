<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WidgetModel;


/**
 * Description of WidgetController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class WidgetController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.widget.index', ['records' => WidgetModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  WidgetModel  $widgetmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, WidgetModel $widgetmodel)
    {
        return view('pages.widget.show', [
                'record' =>$widgetmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.widget.create', [
            'model' => new WidgetModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new WidgetModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'WidgetModel saved successfully');
            return redirect()->route('widget.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving WidgetModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  WidgetModel  $widgetmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, WidgetModel $widgetmodel)
    {

        return view('pages.widget.edit', [
            'model' => $widgetmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  WidgetModel  $widgetmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,WidgetModel $widgetmodel)
    {
        $widgetmodel->fill($request->all());

        if ($widgetmodel->save()) {
            
            session()->flash('app_message', 'WidgetModel successfully updated');
            return redirect()->route('widget.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating WidgetModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  WidgetModel  $widgetmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, WidgetModel $widgetmodel)
    {
        if ($widgetmodel->delete()) {
                session()->flash('app_message', 'WidgetModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting WidgetModel');
            }

        return redirect()->back();
    }
}
