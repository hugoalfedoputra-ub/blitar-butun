<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisGedung;


/**
 * Description of InventarisGedungController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisGedungController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisGedung::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisGedung  $inventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InventarisGedung $inventarisgedung)
    {
        return view('pages.inventaris_gedung.show', [
                'record' =>$inventarisgedung,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_gedung.create', [
            'model' => new InventarisGedung,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisGedung;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisGedung saved successfully');
            return redirect()->route('inventaris_gedung.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisGedung');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisGedung  $inventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisGedung $inventarisgedung)
    {

        return view('pages.inventaris_gedung.edit', [
            'model' => $inventarisgedung,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisGedung  $inventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisGedung $inventarisgedung)
    {
        $inventarisgedung->fill($request->all());

        if ($inventarisgedung->save()) {
            
            session()->flash('app_message', 'InventarisGedung successfully updated');
            return redirect()->route('inventaris_gedung.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisGedung');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisGedung  $inventarisgedung
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisGedung $inventarisgedung)
    {
        if ($inventarisgedung->delete()) {
                session()->flash('app_message', 'InventarisGedung successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisGedung');
            }

        return redirect()->back();
    }
}
