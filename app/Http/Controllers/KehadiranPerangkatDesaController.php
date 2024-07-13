<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranPerangkatDesa;


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
        return KehadiranPerangkatDesa::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesa  $kehadiranperangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kehadiranperangkatdesa = KehadiranPerangkatDesa::find($id);
        if ($kehadiranperangkatdesa) {
            return response()->json($kehadiranperangkatdesa);
        }
        return response()->json(['message' => 'KehadiranPerangkatDesa not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_perangkat_desa.create', [
            'model' => new KehadiranPerangkatDesa,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranPerangkatDesa;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranPerangkatDesa saved successfully');
            return redirect()->route('kehadiran_perangkat_desa.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranPerangkatDesa');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesa  $kehadiranperangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranPerangkatDesa $kehadiranperangkatdesa)
    {

        return view('pages.kehadiran_perangkat_desa.edit', [
            'model' => $kehadiranperangkatdesa,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesa  $kehadiranperangkatdesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranPerangkatDesa $kehadiranperangkatdesa)
    {
        $kehadiranperangkatdesa->fill($request->all());

        if ($kehadiranperangkatdesa->save()) {
            
            session()->flash('app_message', 'KehadiranPerangkatDesa successfully updated');
            return redirect()->route('kehadiran_perangkat_desa.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranPerangkatDesa');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranPerangkatDesa  $kehadiranperangkatdesa
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranPerangkatDesa $kehadiranperangkatdesa)
    {
        if ($kehadiranperangkatdesa->delete()) {
                session()->flash('app_message', 'KehadiranPerangkatDesa successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranPerangkatDesa');
            }

        return redirect()->back();
    }
}
