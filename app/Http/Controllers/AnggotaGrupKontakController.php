<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnggotaGrupKontak;
use App\Models\KontakGrup;
use App\Models\Kontak;
use App\Models\TwebPenduduk;


/**
 * Description of AnggotaGrupKontakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnggotaGrupKontakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.anggota_grup_kontak.index', ['records' => AnggotaGrupKontak::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontak  $anggotagrupkontak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnggotaGrupKontak $anggotagrupkontak)
    {
        return view('pages.anggota_grup_kontak.show', [
                'record' =>$anggotagrupkontak,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$kontak_grup = KontakGrup::all(['id']);
		$kontak = Kontak::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.anggota_grup_kontak.create', [
            'model' => new AnggotaGrupKontak,
			"kontak_grup" => $kontak_grup,
			"kontak" => $kontak,
			"tweb_penduduk" => $tweb_penduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnggotaGrupKontak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnggotaGrupKontak saved successfully');
            return redirect()->route('anggota_grup_kontak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnggotaGrupKontak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontak  $anggotagrupkontak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaGrupKontak $anggotagrupkontak)
    {
		$kontak_grup = KontakGrup::all(['id']);
		$kontak = Kontak::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.anggota_grup_kontak.edit', [
            'model' => $anggotagrupkontak,
			"kontak_grup" => $kontak_grup,
			"kontak" => $kontak,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontak  $anggotagrupkontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnggotaGrupKontak $anggotagrupkontak)
    {
        $anggotagrupkontak->fill($request->all());

        if ($anggotagrupkontak->save()) {
            
            session()->flash('app_message', 'AnggotaGrupKontak successfully updated');
            return redirect()->route('anggota_grup_kontak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnggotaGrupKontak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontak  $anggotagrupkontak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnggotaGrupKontak $anggotagrupkontak)
    {
        if ($anggotagrupkontak->delete()) {
                session()->flash('app_message', 'AnggotaGrupKontak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnggotaGrupKontak');
            }

        return redirect()->back();
    }
}
