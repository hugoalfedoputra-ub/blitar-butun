<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisPeralatan;


/**
 * Description of InventarisPeralatanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisPeralatanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisPeralatan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisPeralatan  $inventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisPeralatan $inventarisperalatan)
    {
        return view('pages.inventaris_peralatan.show', [
                'record' =>$inventarisperalatan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_peralatan.create', [
            'model' => new InventarisPeralatan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisPeralatan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisPeralatan saved successfully');
            return redirect()->route('inventaris_peralatan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisPeralatan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisPeralatan  $inventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisPeralatan $inventarisperalatan)
    {

        return view('pages.inventaris_peralatan.edit', [
            'model' => $inventarisperalatan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisPeralatan  $inventarisperalatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisPeralatan $inventarisperalatan)
    {
        $inventarisperalatan->fill($request->all());

        if ($inventarisperalatan->save()) {
            
            session()->flash('app_message', 'InventarisPeralatan successfully updated');
            return redirect()->route('inventaris_peralatan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisPeralatan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisPeralatan  $inventarisperalatan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisPeralatan $inventarisperalatan)
    {
        if ($inventarisperalatan->delete()) {
                session()->flash('app_message', 'InventarisPeralatan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisPeralatan');
            }

        return redirect()->back();
    }
}
