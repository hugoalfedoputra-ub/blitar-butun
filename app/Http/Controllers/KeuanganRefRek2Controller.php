<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefRek2Model;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefRek2Controller
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefRek2Controller extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_rek2.index', ['records' => KeuanganRefRek2Model::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2Model  $keuanganrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefRek2Model $keuanganrefrek2model)
    {
        return view('pages.keuangan_ref_rek2.show', [
                'record' =>$keuanganrefrek2model,
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

        return view('pages.keuangan_ref_rek2.create', [
            'model' => new KeuanganRefRek2Model,
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
        $model=new KeuanganRefRek2Model;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek2Model saved successfully');
            return redirect()->route('keuangan_ref_rek2.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefRek2Model');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2Model  $keuanganrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefRek2Model $keuanganrefrek2model)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_rek2.edit', [
            'model' => $keuanganrefrek2model,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2Model  $keuanganrefrek2model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefRek2Model $keuanganrefrek2model)
    {
        $keuanganrefrek2model->fill($request->all());

        if ($keuanganrefrek2model->save()) {
            
            session()->flash('app_message', 'KeuanganRefRek2Model successfully updated');
            return redirect()->route('keuangan_ref_rek2.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefRek2Model');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefRek2Model  $keuanganrefrek2model
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefRek2Model $keuanganrefrek2model)
    {
        if ($keuanganrefrek2model->delete()) {
                session()->flash('app_message', 'KeuanganRefRek2Model successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefRek2Model');
            }

        return redirect()->back();
    }
}
