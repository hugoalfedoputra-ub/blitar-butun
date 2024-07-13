<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuPertanyaan;


/**
 * Description of BukuPertanyaanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuPertanyaanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.buku_pertanyaan.index', ['records' => BukuPertanyaan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuPertanyaan  $bukupertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuPertanyaan $bukupertanyaan)
    {
        return view('pages.buku_pertanyaan.show', [
                'record' =>$bukupertanyaan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_pertanyaan.create', [
            'model' => new BukuPertanyaan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuPertanyaan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuPertanyaan saved successfully');
            return redirect()->route('buku_pertanyaan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuPertanyaan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuPertanyaan  $bukupertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuPertanyaan $bukupertanyaan)
    {

        return view('pages.buku_pertanyaan.edit', [
            'model' => $bukupertanyaan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuPertanyaan  $bukupertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuPertanyaan $bukupertanyaan)
    {
        $bukupertanyaan->fill($request->all());

        if ($bukupertanyaan->save()) {
            
            session()->flash('app_message', 'BukuPertanyaan successfully updated');
            return redirect()->route('buku_pertanyaan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuPertanyaan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuPertanyaan  $bukupertanyaan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuPertanyaan $bukupertanyaan)
    {
        if ($bukupertanyaan->delete()) {
                session()->flash('app_message', 'BukuPertanyaan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuPertanyaan');
            }

        return redirect()->back();
    }
}
