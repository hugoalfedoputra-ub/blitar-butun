<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MenuModel;


/**
 * Description of MenuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MenuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.menu.index', ['records' => MenuModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MenuModel  $menumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MenuModel $menumodel)
    {
        return view('pages.menu.show', [
                'record' =>$menumodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.menu.create', [
            'model' => new MenuModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MenuModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MenuModel saved successfully');
            return redirect()->route('menu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MenuModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MenuModel  $menumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MenuModel $menumodel)
    {

        return view('pages.menu.edit', [
            'model' => $menumodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MenuModel  $menumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MenuModel $menumodel)
    {
        $menumodel->fill($request->all());

        if ($menumodel->save()) {
            
            session()->flash('app_message', 'MenuModel successfully updated');
            return redirect()->route('menu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MenuModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MenuModel  $menumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MenuModel $menumodel)
    {
        if ($menumodel->delete()) {
                session()->flash('app_message', 'MenuModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MenuModel');
            }

        return redirect()->back();
    }
}
