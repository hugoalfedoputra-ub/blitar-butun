<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InventarisJalan;


/**
 * Description of InventarisJalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InventarisJalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return InventarisJalan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisJalan  $inventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $inventarisjalan = InventarisJalan::find($id);
        if ($inventarisjalan) {
            return response()->json($inventarisjalan);
        }
        return response()->json(['message' => 'InventarisJalan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inventaris_jalan.create', [
            'model' => new InventarisJalan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InventarisJalan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InventarisJalan saved successfully');
            return redirect()->route('inventaris_jalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InventarisJalan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InventarisJalan  $inventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InventarisJalan $inventarisjalan)
    {

        return view('pages.inventaris_jalan.edit', [
            'model' => $inventarisjalan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InventarisJalan  $inventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InventarisJalan $inventarisjalan)
    {
        $inventarisjalan->fill($request->all());

        if ($inventarisjalan->save()) {
            
            session()->flash('app_message', 'InventarisJalan successfully updated');
            return redirect()->route('inventaris_jalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InventarisJalan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InventarisJalan  $inventarisjalan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InventarisJalan $inventarisjalan)
    {
        if ($inventarisjalan->delete()) {
                session()->flash('app_message', 'InventarisJalan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InventarisJalan');
            }

        return redirect()->back();
    }
}
