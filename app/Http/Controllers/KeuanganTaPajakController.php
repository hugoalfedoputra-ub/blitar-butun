<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeuanganTaPajak;
use App\Models\KeuanganMaster;


/**
 * Description of KeuanganTaPajakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KeuanganTaPajakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.keuangan_ta_pajak.index', ['records' => KeuanganTaPajak::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajak  $keuangantapajak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KeuanganTaPajak $keuangantapajak)
    {
        return view('pages.keuangan_ta_pajak.show', [
                'record' =>$keuangantapajak,
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

        return view('pages.keuangan_ta_pajak.create', [
            'model' => new KeuanganTaPajak,
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
        $model=new KeuanganTaPajak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajak saved successfully');
            return redirect()->route('keuangan_ta_pajak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KeuanganTaPajak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajak  $keuangantapajak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KeuanganTaPajak $keuangantapajak)
    {
		$keuangan_master = KeuanganMaster::all(['id']);

        return view('pages.keuangan_ta_pajak.edit', [
            'model' => $keuangantapajak,
			"keuangan_master" => $keuangan_master,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajak  $keuangantapajak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KeuanganTaPajak $keuangantapajak)
    {
        $keuangantapajak->fill($request->all());

        if ($keuangantapajak->save()) {
            
            session()->flash('app_message', 'KeuanganTaPajak successfully updated');
            return redirect()->route('keuangan_ta_pajak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KeuanganTaPajak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KeuanganTaPajak  $keuangantapajak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KeuanganTaPajak $keuangantapajak)
    {
        if ($keuangantapajak->delete()) {
                session()->flash('app_message', 'KeuanganTaPajak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KeuanganTaPajak');
            }

        return redirect()->back();
    }
}
