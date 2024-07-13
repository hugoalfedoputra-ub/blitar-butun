<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranJamKerjaModel;


/**
 * Description of KehadiranJamKerjaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KehadiranJamKerjaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kehadiran_jam_kerja.index', ['records' => KehadiranJamKerjaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerjaModel  $kehadiranjamkerjamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranJamKerjaModel $kehadiranjamkerjamodel)
    {
        return view('pages.kehadiran_jam_kerja.show', [
                'record' =>$kehadiranjamkerjamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_jam_kerja.create', [
            'model' => new KehadiranJamKerjaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranJamKerjaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranJamKerjaModel saved successfully');
            return redirect()->route('kehadiran_jam_kerja.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranJamKerjaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerjaModel  $kehadiranjamkerjamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranJamKerjaModel $kehadiranjamkerjamodel)
    {

        return view('pages.kehadiran_jam_kerja.edit', [
            'model' => $kehadiranjamkerjamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerjaModel  $kehadiranjamkerjamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranJamKerjaModel $kehadiranjamkerjamodel)
    {
        $kehadiranjamkerjamodel->fill($request->all());

        if ($kehadiranjamkerjamodel->save()) {
            
            session()->flash('app_message', 'KehadiranJamKerjaModel successfully updated');
            return redirect()->route('kehadiran_jam_kerja.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranJamKerjaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerjaModel  $kehadiranjamkerjamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranJamKerjaModel $kehadiranjamkerjamodel)
    {
        if ($kehadiranjamkerjamodel->delete()) {
                session()->flash('app_message', 'KehadiranJamKerjaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranJamKerjaModel');
            }

        return redirect()->back();
    }
}
