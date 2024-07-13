<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganRefSumber;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganRefSumberController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganRefSumberController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ref_sumber.index', ['records' => KeuanganRefSumber::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumber  $keuanganrefsumber
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganRefSumber $keuanganrefsumber)
    {
        return view('pages.keuangan_ref_sumber.show', [
                'record' =>$keuanganrefsumber,
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

        return view('pages.keuangan_ref_sumber.create', [
            'model' => new KeuanganRefSumber,
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
        $model=new KeuanganRefSumber;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganRefSumber saved successfully');
            return redirect()->route('keuangan_ref_sumber.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganRefSumber');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumber  $keuanganrefsumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganRefSumber $keuanganrefsumber)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ref_sumber.edit', [
            'model' => $keuanganrefsumber,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumber  $keuanganrefsumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganRefSumber $keuanganrefsumber)
    {
        $keuanganrefsumber->fill($request->all());

        if ($keuanganrefsumber->save()) {
            
            session()->flash('app_message', 'KeuanganRefSumber successfully updated');
            return redirect()->route('keuangan_ref_sumber.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganRefSumber');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganRefSumber  $keuanganrefsumber
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganRefSumber $keuanganrefsumber)
    {
        if ($keuanganrefsumber->delete()) {
                session()->flash('app_message', 'KeuanganRefSumber successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganRefSumber');
            }

        return redirect()->back();
    }
}
