<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranPerangkatDesaModel;


/**
 * Description of KehadiranPerangkatDesaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KehadiranPerangkatDesaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kehadiran_perangkat_desa.index', ['records' => KehadiranPerangkatDesaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesaModel  $kehadiranperangkatdesamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranPerangkatDesaModel $kehadiranperangkatdesamodel)
    {
        return view('pages.kehadiran_perangkat_desa.show', [
                'record' =>$kehadiranperangkatdesamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_perangkat_desa.create', [
            'model' => new KehadiranPerangkatDesaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranPerangkatDesaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranPerangkatDesaModel saved successfully');
            return redirect()->route('kehadiran_perangkat_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranPerangkatDesaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesaModel  $kehadiranperangkatdesamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranPerangkatDesaModel $kehadiranperangkatdesamodel)
    {

        return view('pages.kehadiran_perangkat_desa.edit', [
            'model' => $kehadiranperangkatdesamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesaModel  $kehadiranperangkatdesamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranPerangkatDesaModel $kehadiranperangkatdesamodel)
    {
        $kehadiranperangkatdesamodel->fill($request->all());

        if ($kehadiranperangkatdesamodel->save()) {
            
            session()->flash('app_message', 'KehadiranPerangkatDesaModel successfully updated');
            return redirect()->route('kehadiran_perangkat_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranPerangkatDesaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesaModel  $kehadiranperangkatdesamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranPerangkatDesaModel $kehadiranperangkatdesamodel)
    {
        if ($kehadiranperangkatdesamodel->delete()) {
                session()->flash('app_message', 'KehadiranPerangkatDesaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranPerangkatDesaModel');
            }

        return redirect()->back();
    }
}
