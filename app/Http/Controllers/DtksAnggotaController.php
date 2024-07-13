<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DtksAnggotaModel;
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
        return view('pages.dtks_anggota.index', ['records' => DtksAnggotaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DtksAnggotaModel  $dtksanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, DtksAnggotaModel $dtksanggotamodel)
    {
        return view('pages.dtks_anggota.show', [
                'record' =>$dtksanggotamodel,
        ]);

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
            'model' => new DtksAnggotaModel,
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
        $model=new DtksAnggotaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DtksAnggotaModel saved successfully');
            return redirect()->route('dtks_anggota.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DtksAnggotaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DtksAnggotaModel  $dtksanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DtksAnggotaModel $dtksanggotamodel)
    {
		$dtks = Dtk::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);
		$tweb_keluarga = TwebKeluarga::all(['id']);

        return view('pages.dtks_anggota.edit', [
            'model' => $dtksanggotamodel,
			"dtks" => $dtks,
			"tweb_penduduk" => $tweb_penduduk,
			"tweb_keluarga" => $tweb_keluarga,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DtksAnggotaModel  $dtksanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DtksAnggotaModel $dtksanggotamodel)
    {
        $dtksanggotamodel->fill($request->all());

        if ($dtksanggotamodel->save()) {
            
            session()->flash('app_message', 'DtksAnggotaModel successfully updated');
            return redirect()->route('dtks_anggota.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DtksAnggotaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DtksAnggotaModel  $dtksanggotamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DtksAnggotaModel $dtksanggotamodel)
    {
        if ($dtksanggotamodel->delete()) {
                session()->flash('app_message', 'DtksAnggotaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DtksAnggotaModel');
            }

        return redirect()->back();
    }
}
