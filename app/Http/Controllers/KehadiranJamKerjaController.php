<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KehadiranJamKerja;


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
        return KehadiranJamKerja::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerja  $kehadiranjamkerja
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $kehadiranjamkerja = KehadiranJamKerja::find($id);
        if ($kehadiranjamkerja) {
            return response()->json($kehadiranjamkerja);
        }
        return response()->json(['message' => 'KehadiranJamKerja not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kehadiran_jam_kerja.create', [
            'model' => new KehadiranJamKerja,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KehadiranJamKerja;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KehadiranJamKerja saved successfully');
            return redirect()->route('kehadiran_jam_kerja.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KehadiranJamKerja');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerja  $kehadiranjamkerja
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KehadiranJamKerja $kehadiranjamkerja)
    {

        return view('pages.kehadiran_jam_kerja.edit', [
            'model' => $kehadiranjamkerja,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerja  $kehadiranjamkerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KehadiranJamKerja $kehadiranjamkerja)
    {
        $kehadiranjamkerja->fill($request->all());

        if ($kehadiranjamkerja->save()) {
            
            session()->flash('app_message', 'KehadiranJamKerja successfully updated');
            return redirect()->route('kehadiran_jam_kerja.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KehadiranJamKerja');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KehadiranJamKerja  $kehadiranjamkerja
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KehadiranJamKerja $kehadiranjamkerja)
    {
        if ($kehadiranjamkerja->delete()) {
                session()->flash('app_message', 'KehadiranJamKerja successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KehadiranJamKerja');
            }

        return redirect()->back();
    }
}
