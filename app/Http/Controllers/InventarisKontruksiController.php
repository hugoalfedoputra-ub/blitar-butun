<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisKontruksi;


/**
 * Description of InventarisKontruksiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisKontruksiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisKontruksi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisKontruksi  $inventariskontruksi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $inventariskontruksi = InventarisKontruksi::find($id);
        if ($inventariskontruksi) {
            return response()->json($inventariskontruksi);
        }
        return response()->json(['message' => 'InventarisKontruksi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_kontruksi.create', [
            'model' => new InventarisKontruksi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisKontruksi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisKontruksi saved successfully');
            return redirect()->route('inventaris_kontruksi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisKontruksi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisKontruksi  $inventariskontruksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisKontruksi $inventariskontruksi)
    {

        return view('pages.inventaris_kontruksi.edit', [
            'model' => $inventariskontruksi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisKontruksi  $inventariskontruksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisKontruksi $inventariskontruksi)
    {
        $inventariskontruksi->fill($request->all());

        if ($inventariskontruksi->save()) {
            
            session()->flash('app_message', 'InventarisKontruksi successfully updated');
            return redirect()->route('inventaris_kontruksi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisKontruksi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisKontruksi  $inventariskontruksi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisKontruksi $inventariskontruksi)
    {
        if ($inventariskontruksi->delete()) {
                session()->flash('app_message', 'InventarisKontruksi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisKontruksi');
            }

        return redirect()->back();
    }
}
