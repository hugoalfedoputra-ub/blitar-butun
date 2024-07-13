<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisTanah;


/**
 * Description of InventarisTanahController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisTanahController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisTanah::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisTanah  $inventaristanah
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisTanah $inventaristanah)
    {
        return view('pages.inventaris_tanah.show', [
                'record' =>$inventaristanah,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_tanah.create', [
            'model' => new InventarisTanah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisTanah;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisTanah saved successfully');
            return redirect()->route('inventaris_tanah.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisTanah');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisTanah  $inventaristanah
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisTanah $inventaristanah)
    {

        return view('pages.inventaris_tanah.edit', [
            'model' => $inventaristanah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisTanah  $inventaristanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisTanah $inventaristanah)
    {
        $inventaristanah->fill($request->all());

        if ($inventaristanah->save()) {
            
            session()->flash('app_message', 'InventarisTanah successfully updated');
            return redirect()->route('inventaris_tanah.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisTanah');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisTanah  $inventaristanah
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisTanah $inventaristanah)
    {
        if ($inventaristanah->delete()) {
                session()->flash('app_message', 'InventarisTanah successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisTanah');
            }

        return redirect()->back();
    }
}
