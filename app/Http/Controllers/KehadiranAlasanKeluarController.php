<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranAlasanKeluar;


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
        return KehadiranAlasanKeluar::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluar  $kehadiranalasankeluar
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kehadiranalasankeluar = KehadiranAlasanKeluar::find($id);
        if ($kehadiranalasankeluar) {
            return response()->json($kehadiranalasankeluar);
        }
        return response()->json(['message' => 'KehadiranAlasanKeluar not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_alasan_keluar.create', [
            'model' => new KehadiranAlasanKeluar,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranAlasanKeluar;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranAlasanKeluar saved successfully');
            return redirect()->route('kehadiran_alasan_keluar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranAlasanKeluar');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluar  $kehadiranalasankeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranAlasanKeluar $kehadiranalasankeluar)
    {

        return view('pages.kehadiran_alasan_keluar.edit', [
            'model' => $kehadiranalasankeluar,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluar  $kehadiranalasankeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranAlasanKeluar $kehadiranalasankeluar)
    {
        $kehadiranalasankeluar->fill($request->all());

        if ($kehadiranalasankeluar->save()) {
            
            session()->flash('app_message', 'KehadiranAlasanKeluar successfully updated');
            return redirect()->route('kehadiran_alasan_keluar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranAlasanKeluar');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranAlasanKeluar  $kehadiranalasankeluar
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranAlasanKeluar $kehadiranalasankeluar)
    {
        if ($kehadiranalasankeluar->delete()) {
                session()->flash('app_message', 'KehadiranAlasanKeluar successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranAlasanKeluar');
            }

        return redirect()->back();
    }
}
