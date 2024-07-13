<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisJalan;
use App\Models\InventarisJalan;


/**
 * Description of MutasiInventarisJalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisJalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return MutasiInventarisJalan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalan  $mutasiinventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $mutasiinventarisjalan = MutasiInventarisJalan::find($id);
        if ($mutasiinventarisjalan) {
            return response()->json($mutasiinventarisjalan);
        }
        return response()->json(['message' => 'MutasiInventarisJalan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_jalan = InventarisJalan::all(['id']);

        return view('pages.mutasi_inventaris_jalan.create', [
            'model' => new MutasiInventarisJalan,
			"inventaris_jalan" => $inventaris_jalan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisJalan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisJalan saved successfully');
            return redirect()->route('mutasi_inventaris_jalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisJalan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalan  $mutasiinventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisJalan $mutasiinventarisjalan)
    {
		$inventaris_jalan = InventarisJalan::all(['id']);

        return view('pages.mutasi_inventaris_jalan.edit', [
            'model' => $mutasiinventarisjalan,
			"inventaris_jalan" => $inventaris_jalan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalan  $mutasiinventarisjalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisJalan $mutasiinventarisjalan)
    {
        $mutasiinventarisjalan->fill($request->all());

        if ($mutasiinventarisjalan->save()) {
            
            session()->flash('app_message', 'MutasiInventarisJalan successfully updated');
            return redirect()->route('mutasi_inventaris_jalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisJalan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisJalan  $mutasiinventarisjalan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisJalan $mutasiinventarisjalan)
    {
        if ($mutasiinventarisjalan->delete()) {
                session()->flash('app_message', 'MutasiInventarisJalan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisJalan');
            }

        return redirect()->back();
    }
}
