<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPajakRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPajakRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPajakRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaPajakRinci::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinci  $keuangantapajakrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPajakRinci $keuangantapajakrinci)
    {
        return view('pages.keuangan_ta_pajak_rinci.show', [
                'record' =>$keuangantapajakrinci,
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

        return view('pages.keuangan_ta_pajak_rinci.create', [
            'model' => new KeuanganTaPajakRinci,
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
        $model=new KeuanganTaPajakRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakRinci saved successfully');
            return redirect()->route('keuangan_ta_pajak_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPajakRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinci  $keuangantapajakrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPajakRinci $keuangantapajakrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pajak_rinci.edit', [
            'model' => $keuangantapajakrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinci  $keuangantapajakrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPajakRinci $keuangantapajakrinci)
    {
        $keuangantapajakrinci->fill($request->all());

        if ($keuangantapajakrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajakRinci successfully updated');
            return redirect()->route('keuangan_ta_pajak_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPajakRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajakRinci  $keuangantapajakrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPajakRinci $keuangantapajakrinci)
    {
        if ($keuangantapajakrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaPajakRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPajakRinci');
            }

        return redirect()->back();
    }
}
