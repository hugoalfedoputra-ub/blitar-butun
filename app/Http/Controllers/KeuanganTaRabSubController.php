<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaRabSub;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaRabSubController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaRabSubController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeuanganTaRabSub::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSub  $keuangantarabsub
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaRabSub $keuangantarabsub)
    {
        return view('pages.keuangan_ta_rab_sub.show', [
                'record' =>$keuangantarabsub,
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

        return view('pages.keuangan_ta_rab_sub.create', [
            'model' => new KeuanganTaRabSub,
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
        $model=new KeuanganTaRabSub;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabSub saved successfully');
            return redirect()->route('keuangan_ta_rab_sub.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaRabSub');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSub  $keuangantarabsub
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaRabSub $keuangantarabsub)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_rab_sub.edit', [
            'model' => $keuangantarabsub,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSub  $keuangantarabsub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaRabSub $keuangantarabsub)
    {
        $keuangantarabsub->fill($request->all());

        if ($keuangantarabsub->save()) {
            
            session()->flash('app_message', 'KeuanganTaRabSub successfully updated');
            return redirect()->route('keuangan_ta_rab_sub.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaRabSub');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaRabSub  $keuangantarabsub
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaRabSub $keuangantarabsub)
    {
        if ($keuangantarabsub->delete()) {
                session()->flash('app_message', 'KeuanganTaRabSub successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaRabSub');
            }

        return redirect()->back();
    }
}
