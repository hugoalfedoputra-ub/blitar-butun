<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;


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
        return Menu::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Menu $menu)
    {
        return view('pages.menu.show', [
                'record' =>$menu,
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
            'model' => new Menu,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Menu;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Menu saved successfully');
            return redirect()->route('menu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Menu');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Menu $menu)
    {

        return view('pages.menu.edit', [
            'model' => $menu,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Menu $menu)
    {
        $menu->fill($request->all());

        if ($menu->save()) {
            
            session()->flash('app_message', 'Menu successfully updated');
            return redirect()->route('menu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Menu');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Menu  $menu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Menu $menu)
    {
        if ($menu->delete()) {
                session()->flash('app_message', 'Menu successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Menu');
            }

        return redirect()->back();
    }
}
