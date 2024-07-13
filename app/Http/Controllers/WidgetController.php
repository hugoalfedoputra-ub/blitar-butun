<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Widget;


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
        return Widget::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $widget = Widget::find($id);
        if ($widget) {
            return response()->json($widget);
        }
        return response()->json(['message' => 'Widget not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.widget.create', [
            'model' => new Widget,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Widget;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Widget saved successfully');
            return redirect()->route('widget.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Widget');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Widget $widget)
    {

        return view('pages.widget.edit', [
            'model' => $widget,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Widget $widget)
    {
        $widget->fill($request->all());

        if ($widget->save()) {
            
            session()->flash('app_message', 'Widget successfully updated');
            return redirect()->route('widget.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Widget');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Widget  $widget
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Widget $widget)
    {
        if ($widget->delete()) {
                session()->flash('app_message', 'Widget successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Widget');
            }

        return redirect()->back();
    }
}
