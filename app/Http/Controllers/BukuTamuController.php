<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuTamu;


/**
 * Description of BukuTamuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuTamuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.buku_tamu.index', ['records' => BukuTamu::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuTamu  $bukutamu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuTamu $bukutamu)
    {
        return view('pages.buku_tamu.show', [
                'record' =>$bukutamu,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_tamu.create', [
            'model' => new BukuTamu,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuTamu;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuTamu saved successfully');
            return redirect()->route('buku_tamu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuTamu');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuTamu  $bukutamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuTamu $bukutamu)
    {

        return view('pages.buku_tamu.edit', [
            'model' => $bukutamu,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuTamu  $bukutamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuTamu $bukutamu)
    {
        $bukutamu->fill($request->all());

        if ($bukutamu->save()) {
            
            session()->flash('app_message', 'BukuTamu successfully updated');
            return redirect()->route('buku_tamu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuTamu');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuTamu  $bukutamu
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuTamu $bukutamu)
    {
        if ($bukutamu->delete()) {
                session()->flash('app_message', 'BukuTamu successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuTamu');
            }

        return redirect()->back();
    }
}
