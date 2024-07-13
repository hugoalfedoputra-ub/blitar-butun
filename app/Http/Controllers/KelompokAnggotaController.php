<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelompokAnggota;
use App\Models\Kelompok;


/**
 * Description of KelompokAnggotaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KelompokAnggotaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KelompokAnggota::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokAnggota  $kelompokanggota
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KelompokAnggota $kelompokanggota)
    {
        return view('pages.kelompok_anggota.show', [
                'record' =>$kelompokanggota,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$kelompok = Kelompok::all(['id']);

        return view('pages.kelompok_anggota.create', [
            'model' => new KelompokAnggota,
			"kelompok" => $kelompok,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KelompokAnggota;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KelompokAnggota saved successfully');
            return redirect()->route('kelompok_anggota.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KelompokAnggota');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokAnggota  $kelompokanggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KelompokAnggota $kelompokanggota)
    {
		$kelompok = Kelompok::all(['id']);

        return view('pages.kelompok_anggota.edit', [
            'model' => $kelompokanggota,
			"kelompok" => $kelompok,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KelompokAnggota  $kelompokanggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KelompokAnggota $kelompokanggota)
    {
        $kelompokanggota->fill($request->all());

        if ($kelompokanggota->save()) {
            
            session()->flash('app_message', 'KelompokAnggota successfully updated');
            return redirect()->route('kelompok_anggota.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KelompokAnggota');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KelompokAnggota  $kelompokanggota
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KelompokAnggota $kelompokanggota)
    {
        if ($kelompokanggota->delete()) {
                session()->flash('app_message', 'KelompokAnggota successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KelompokAnggota');
            }

        return redirect()->back();
    }
}
