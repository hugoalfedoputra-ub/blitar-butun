<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksAnggota;
use App\Models\Dtk;
use App\Models\TwebPenduduk;
use App\Models\TwebKeluarga;


/**
 * Description of DtksAnggotaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DtksAnggotaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DtksAnggota::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksAnggota  $dtksanggota
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $dtksanggota = DtksAnggota::find($id);
        if ($dtksanggota) {
            return response()->json($dtksanggota);
        }
        return response()->json(['message' => 'DtksAnggota not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$dtks = Dtk::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks_anggota.create', [
            'model' => new DtksAnggota,
			"dtks" => $dtks,
			"tweb_penduduk" => $tweb_penduduk,
			"tweb_keluarga" => $tweb_keluarga,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DtksAnggota;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksAnggota saved successfully');
            return redirect()->route('dtks_anggota.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksAnggota');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksAnggota  $dtksanggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksAnggota $dtksanggota)
    {
		$dtks = Dtk::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks_anggota.edit', [
            'model' => $dtksanggota,
			"dtks" => $dtks,
			"tweb_penduduk" => $tweb_penduduk,
			"tweb_keluarga" => $tweb_keluarga,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksAnggota  $dtksanggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksAnggota $dtksanggota)
    {
        $dtksanggota->fill($request->all());

        if ($dtksanggota->save()) {
            
            session()->flash('app_message', 'DtksAnggota successfully updated');
            return redirect()->route('dtks_anggota.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksAnggota');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksAnggota  $dtksanggota
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksAnggota $dtksanggota)
    {
        if ($dtksanggota->delete()) {
                session()->flash('app_message', 'DtksAnggota successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksAnggota');
            }

        return redirect()->back();
    }
}
