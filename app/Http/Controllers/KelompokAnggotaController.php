<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelompokAnggotaModel;
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
        return view('pages.kelompok_anggota.index', ['records' => KelompokAnggotaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokAnggotaModel  $kelompokanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KelompokAnggotaModel $kelompokanggotamodel)
    {
        return view('pages.kelompok_anggota.show', [
                'record' =>$kelompokanggotamodel,
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
            'model' => new KelompokAnggotaModel,
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
        $model=new KelompokAnggotaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KelompokAnggotaModel saved successfully');
            return redirect()->route('kelompok_anggota.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KelompokAnggotaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokAnggotaModel  $kelompokanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KelompokAnggotaModel $kelompokanggotamodel)
    {
		$kelompok = Kelompok::all(['id']);

        return view('pages.kelompok_anggota.edit', [
            'model' => $kelompokanggotamodel,
			"kelompok" => $kelompok,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KelompokAnggotaModel  $kelompokanggotamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KelompokAnggotaModel $kelompokanggotamodel)
    {
        $kelompokanggotamodel->fill($request->all());

        if ($kelompokanggotamodel->save()) {
            
            session()->flash('app_message', 'KelompokAnggotaModel successfully updated');
            return redirect()->route('kelompok_anggota.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KelompokAnggotaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KelompokAnggotaModel  $kelompokanggotamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KelompokAnggotaModel $kelompokanggotamodel)
    {
        if ($kelompokanggotamodel->delete()) {
                session()->flash('app_message', 'KelompokAnggotaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KelompokAnggotaModel');
            }

        return redirect()->back();
    }
}
