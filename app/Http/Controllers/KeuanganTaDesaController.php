<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaDesa;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_desa.index', ['records' => KeuanganTaDesa::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesa  $keuangantadesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaDesa $keuangantadesa)
    {
        return view('pages.keuangan_ta_desa.show', [
                'record' =>$keuangantadesa,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_desa.create', [
            'model' => new KeuanganTaDesa,
			"keuangan_master" => $keuangan_master,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KeuanganTaDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaDesa saved successfully');
            return redirect()->route('keuangan_ta_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesa  $keuangantadesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaDesa $keuangantadesa)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_desa.edit', [
            'model' => $keuangantadesa,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesa  $keuangantadesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaDesa $keuangantadesa)
    {
        $keuangantadesa->fill($request->all());

        if ($keuangantadesa->save()) {
            
            session()->flash('app_message', 'KeuanganTaDesa successfully updated');
            return redirect()->route('keuangan_ta_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaDesa  $keuangantadesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaDesa $keuangantadesa)
    {
        if ($keuangantadesa->delete()) {
                session()->flash('app_message', 'KeuanganTaDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaDesa');
            }

        return redirect()->back();
    }
}
