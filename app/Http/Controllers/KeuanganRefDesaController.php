<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefDesa;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_desa.index', ['records' => KeuanganRefDesa::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesa  $keuanganrefdesa
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefDesa $keuanganrefdesa)
    {
        return view('pages.keuangan_ref_desa.show', [
                'record' =>$keuanganrefdesa,
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

        return view('pages.keuangan_ref_desa.create', [
            'model' => new KeuanganRefDesa,
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
        $model=new KeuanganRefDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefDesa saved successfully');
            return redirect()->route('keuangan_ref_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesa  $keuanganrefdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefDesa $keuanganrefdesa)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_desa.edit', [
            'model' => $keuanganrefdesa,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesa  $keuanganrefdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefDesa $keuanganrefdesa)
    {
        $keuanganrefdesa->fill($request->all());

        if ($keuanganrefdesa->save()) {
            
            session()->flash('app_message', 'KeuanganRefDesa successfully updated');
            return redirect()->route('keuangan_ref_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefDesa  $keuanganrefdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefDesa $keuanganrefdesa)
    {
        if ($keuanganrefdesa->delete()) {
                session()->flash('app_message', 'KeuanganRefDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefDesa');
            }

        return redirect()->back();
    }
}
