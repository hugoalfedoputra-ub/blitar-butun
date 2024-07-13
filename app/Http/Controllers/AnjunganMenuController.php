<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnjunganMenu;


/**
 * Description of AnjunganMenuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnjunganMenuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnjunganMenu::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganMenu  $anjunganmenu
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $anjunganmenu = AnjunganMenu::find($id);
        if ($anjunganmenu) {
            return response()->json($anjunganmenu);
        }
        return response()->json(['message' => 'AnjunganMenu not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.anjungan_menu.create', [
            'model' => new AnjunganMenu,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnjunganMenu;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnjunganMenu saved successfully');
            return redirect()->route('anjungan_menu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnjunganMenu');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganMenu  $anjunganmenu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnjunganMenu $anjunganmenu)
    {

        return view('pages.anjungan_menu.edit', [
            'model' => $anjunganmenu,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnjunganMenu  $anjunganmenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnjunganMenu $anjunganmenu)
    {
        $anjunganmenu->fill($request->all());

        if ($anjunganmenu->save()) {
            
            session()->flash('app_message', 'AnjunganMenu successfully updated');
            return redirect()->route('anjungan_menu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnjunganMenu');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnjunganMenu  $anjunganmenu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnjunganMenu $anjunganmenu)
    {
        if ($anjunganmenu->delete()) {
                session()->flash('app_message', 'AnjunganMenu successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnjunganMenu');
            }

        return redirect()->back();
    }
}
