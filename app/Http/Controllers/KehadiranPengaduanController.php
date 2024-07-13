<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranPengaduanModel;


/**
 * Description of KehadiranPengaduanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KehadiranPengaduanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kehadiran_pengaduan.index', ['records' => KehadiranPengaduanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduanModel  $kehadiranpengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranPengaduanModel $kehadiranpengaduanmodel)
    {
        return view('pages.kehadiran_pengaduan.show', [
                'record' =>$kehadiranpengaduanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_pengaduan.create', [
            'model' => new KehadiranPengaduanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranPengaduanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranPengaduanModel saved successfully');
            return redirect()->route('kehadiran_pengaduan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranPengaduanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduanModel  $kehadiranpengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranPengaduanModel $kehadiranpengaduanmodel)
    {

        return view('pages.kehadiran_pengaduan.edit', [
            'model' => $kehadiranpengaduanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduanModel  $kehadiranpengaduanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranPengaduanModel $kehadiranpengaduanmodel)
    {
        $kehadiranpengaduanmodel->fill($request->all());

        if ($kehadiranpengaduanmodel->save()) {
            
            session()->flash('app_message', 'KehadiranPengaduanModel successfully updated');
            return redirect()->route('kehadiran_pengaduan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranPengaduanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduanModel  $kehadiranpengaduanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranPengaduanModel $kehadiranpengaduanmodel)
    {
        if ($kehadiranpengaduanmodel->delete()) {
                session()->flash('app_message', 'KehadiranPengaduanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranPengaduanModel');
            }

        return redirect()->back();
    }
}
