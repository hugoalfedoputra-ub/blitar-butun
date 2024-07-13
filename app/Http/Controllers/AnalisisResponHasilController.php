<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AnalisisResponHasil;


/**
 * Description of AnalisisResponHasilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AnalisisResponHasilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return AnalisisResponHasil::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasil  $analisisresponhasil
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $analisisresponhasil = AnalisisResponHasil::find($id);
        if ($analisisresponhasil) {
            return response()->json($analisisresponhasil);
        }
        return response()->json(['message' => 'AnalisisResponHasil not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.analisis_respon_hasil.create', [
            'model' => new AnalisisResponHasil,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new AnalisisResponHasil;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AnalisisResponHasil saved successfully');
            return redirect()->route('analisis_respon_hasil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AnalisisResponHasil');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasil  $analisisresponhasil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AnalisisResponHasil $analisisresponhasil)
    {

        return view('pages.analisis_respon_hasil.edit', [
            'model' => $analisisresponhasil,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasil  $analisisresponhasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,AnalisisResponHasil $analisisresponhasil)
    {
        $analisisresponhasil->fill($request->all());

        if ($analisisresponhasil->save()) {
            
            session()->flash('app_message', 'AnalisisResponHasil successfully updated');
            return redirect()->route('analisis_respon_hasil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AnalisisResponHasil');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  AnalisisResponHasil  $analisisresponhasil
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, AnalisisResponHasil $analisisresponhasil)
    {
        if ($analisisresponhasil->delete()) {
                session()->flash('app_message', 'AnalisisResponHasil successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AnalisisResponHasil');
            }

        return redirect()->back();
    }
}
