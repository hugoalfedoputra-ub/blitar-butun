<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranPengaduan;


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
        return KehadiranPengaduan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduan  $kehadiranpengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KehadiranPengaduan $kehadiranpengaduan)
    {
        return view('pages.kehadiran_pengaduan.show', [
                'record' =>$kehadiranpengaduan,
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
            'model' => new KehadiranPengaduan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranPengaduan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranPengaduan saved successfully');
            return redirect()->route('kehadiran_pengaduan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranPengaduan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduan  $kehadiranpengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranPengaduan $kehadiranpengaduan)
    {

        return view('pages.kehadiran_pengaduan.edit', [
            'model' => $kehadiranpengaduan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduan  $kehadiranpengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranPengaduan $kehadiranpengaduan)
    {
        $kehadiranpengaduan->fill($request->all());

        if ($kehadiranpengaduan->save()) {
            
            session()->flash('app_message', 'KehadiranPengaduan successfully updated');
            return redirect()->route('kehadiran_pengaduan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranPengaduan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranPengaduan  $kehadiranpengaduan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranPengaduan $kehadiranpengaduan)
    {
        if ($kehadiranpengaduan->delete()) {
                session()->flash('app_message', 'KehadiranPengaduan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranPengaduan');
            }

        return redirect()->back();
    }
}
