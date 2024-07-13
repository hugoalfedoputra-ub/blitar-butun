<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranAlasanKeluarModel;


/**
 * Description of KehadiranAlasanKeluarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KehadiranAlasanKeluarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kehadiran_alasan_keluar.index', ['records' => KehadiranAlasanKeluarModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluarModel  $kehadiranalasankeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranAlasanKeluarModel $kehadiranalasankeluarmodel)
    {
        return view('pages.kehadiran_alasan_keluar.show', [
                'record' =>$kehadiranalasankeluarmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_alasan_keluar.create', [
            'model' => new KehadiranAlasanKeluarModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranAlasanKeluarModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranAlasanKeluarModel saved successfully');
            return redirect()->route('kehadiran_alasan_keluar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranAlasanKeluarModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluarModel  $kehadiranalasankeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranAlasanKeluarModel $kehadiranalasankeluarmodel)
    {

        return view('pages.kehadiran_alasan_keluar.edit', [
            'model' => $kehadiranalasankeluarmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluarModel  $kehadiranalasankeluarmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranAlasanKeluarModel $kehadiranalasankeluarmodel)
    {
        $kehadiranalasankeluarmodel->fill($request->all());

        if ($kehadiranalasankeluarmodel->save()) {
            
            session()->flash('app_message', 'KehadiranAlasanKeluarModel successfully updated');
            return redirect()->route('kehadiran_alasan_keluar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranAlasanKeluarModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluarModel  $kehadiranalasankeluarmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranAlasanKeluarModel $kehadiranalasankeluarmodel)
    {
        if ($kehadiranalasankeluarmodel->delete()) {
                session()->flash('app_message', 'KehadiranAlasanKeluarModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranAlasanKeluarModel');
            }

        return redirect()->back();
    }
}
