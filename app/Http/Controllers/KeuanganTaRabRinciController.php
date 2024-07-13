<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRabRinci;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRabRinciController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRabRinciController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_rab_rinci.index', ['records' => KeuanganTaRabRinci::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinci  $keuangantarabrinci
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRabRinci $keuangantarabrinci)
    {
        return view('pages.keuangan_ta_rab_rinci.show', [
                'record' =>$keuangantarabrinci,
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

        return view('pages.keuangan_ta_rab_rinci.create', [
            'model' => new KeuanganTaRabRinci,
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
        $model=new KeuanganTaRabRinci;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabRinci saved successfully');
            return redirect()->route('keuangan_ta_rab_rinci.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRabRinci');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinci  $keuangantarabrinci
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRabRinci $keuangantarabrinci)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab_rinci.edit', [
            'model' => $keuangantarabrinci,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinci  $keuangantarabrinci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRabRinci $keuangantarabrinci)
    {
        $keuangantarabrinci->fill($request->all());

        if ($keuangantarabrinci->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabRinci successfully updated');
            return redirect()->route('keuangan_ta_rab_rinci.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRabRinci');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabRinci  $keuangantarabrinci
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRabRinci $keuangantarabrinci)
    {
        if ($keuangantarabrinci->delete()) {
                session()->flash('app_message', 'KeuanganTaRabRinci successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRabRinci');
            }

        return redirect()->back();
    }
}
