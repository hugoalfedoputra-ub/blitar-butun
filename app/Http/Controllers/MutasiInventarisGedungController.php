<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MutasiInventarisGedung;
use App\Models\InventarisGedung;


/**
 * Description of MutasiInventarisGedungController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MutasiInventarisGedungController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return MutasiInventarisGedung::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedung  $mutasiinventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $mutasiinventarisgedung = MutasiInventarisGedung::find($id);
        if ($mutasiinventarisgedung) {
            return response()->json($mutasiinventarisgedung);
        }
        return response()->json(['message' => 'MutasiInventarisGedung not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$inventaris_gedung = InventarisGedung::all(['id']);

        return view('pages.mutasi_inventaris_gedung.create', [
            'model' => new MutasiInventarisGedung,
			"inventaris_gedung" => $inventaris_gedung,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new MutasiInventarisGedung;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'MutasiInventarisGedung saved successfully');
            return redirect()->route('mutasi_inventaris_gedung.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving MutasiInventarisGedung');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedung  $mutasiinventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, MutasiInventarisGedung $mutasiinventarisgedung)
    {
		$inventaris_gedung = InventarisGedung::all(['id']);

        return view('pages.mutasi_inventaris_gedung.edit', [
            'model' => $mutasiinventarisgedung,
			"inventaris_gedung" => $inventaris_gedung,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedung  $mutasiinventarisgedung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,MutasiInventarisGedung $mutasiinventarisgedung)
    {
        $mutasiinventarisgedung->fill($request->all());

        if ($mutasiinventarisgedung->save()) {
            
            session()->flash('app_message', 'MutasiInventarisGedung successfully updated');
            return redirect()->route('mutasi_inventaris_gedung.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating MutasiInventarisGedung');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  MutasiInventarisGedung  $mutasiinventarisgedung
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, MutasiInventarisGedung $mutasiinventarisgedung)
    {
        if ($mutasiinventarisgedung->delete()) {
                session()->flash('app_message', 'MutasiInventarisGedung successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting MutasiInventarisGedung');
            }

        return redirect()->back();
    }
}
