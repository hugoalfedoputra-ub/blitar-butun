<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnggotaGrupKontakModel;
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
        return view('pages.anggota_grup_kontak.index', ['records' => AnggotaGrupKontakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontakModel  $anggotagrupkontakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AnggotaGrupKontakModel $anggotagrupkontakmodel)
    {
        return view('pages.anggota_grup_kontak.show', [
                'record' =>$anggotagrupkontakmodel,
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
            'model' => new AnggotaGrupKontakModel,
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
        $model=new AnggotaGrupKontakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnggotaGrupKontakModel saved successfully');
            return redirect()->route('anggota_grup_kontak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnggotaGrupKontakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontakModel  $anggotagrupkontakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnggotaGrupKontakModel $anggotagrupkontakmodel)
    {
		$kontak_grup = KontakGrup::all(['id']);
		$kontak = Kontak::all(['id']);
		$tweb_penduduk = TwebPenduduk::all(['id']);

        return view('pages.anggota_grup_kontak.edit', [
            'model' => $anggotagrupkontakmodel,
			"kontak_grup" => $kontak_grup,
			"kontak" => $kontak,
			"tweb_penduduk" => $tweb_penduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontakModel  $anggotagrupkontakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnggotaGrupKontakModel $anggotagrupkontakmodel)
    {
        $anggotagrupkontakmodel->fill($request->all());

        if ($anggotagrupkontakmodel->save()) {
            
            session()->flash('app_message', 'AnggotaGrupKontakModel successfully updated');
            return redirect()->route('anggota_grup_kontak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnggotaGrupKontakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnggotaGrupKontakModel  $anggotagrupkontakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnggotaGrupKontakModel $anggotagrupkontakmodel)
    {
        if ($anggotagrupkontakmodel->delete()) {
                session()->flash('app_message', 'AnggotaGrupKontakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnggotaGrupKontakModel');
            }

        return redirect()->back();
    }
}
