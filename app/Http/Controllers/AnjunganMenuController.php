<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnjunganMenuModel;


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
        return view('pages.anjungan_menu.index', ['records' => AnjunganMenuModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganMenuModel  $anjunganmenumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnjunganMenuModel $anjunganmenumodel)
    {
        return view('pages.anjungan_menu.show', [
                'record' =>$anjunganmenumodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.anjungan_menu.create', [
            'model' => new AnjunganMenuModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnjunganMenuModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnjunganMenuModel saved successfully');
            return redirect()->route('anjungan_menu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnjunganMenuModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnjunganMenuModel  $anjunganmenumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnjunganMenuModel $anjunganmenumodel)
    {

        return view('pages.anjungan_menu.edit', [
            'model' => $anjunganmenumodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnjunganMenuModel  $anjunganmenumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnjunganMenuModel $anjunganmenumodel)
    {
        $anjunganmenumodel->fill($request->all());

        if ($anjunganmenumodel->save()) {
            
            session()->flash('app_message', 'AnjunganMenuModel successfully updated');
            return redirect()->route('anjungan_menu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnjunganMenuModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnjunganMenuModel  $anjunganmenumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnjunganMenuModel $anjunganmenumodel)
    {
        if ($anjunganmenumodel->delete()) {
                session()->flash('app_message', 'AnjunganMenuModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnjunganMenuModel');
            }

        return redirect()->back();
    }
}
