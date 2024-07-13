<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuPertanyaanModel;


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
        return view('pages.buku_pertanyaan.index', ['records' => BukuPertanyaanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuPertanyaanModel  $bukupertanyaanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuPertanyaanModel $bukupertanyaanmodel)
    {
        return view('pages.buku_pertanyaan.show', [
                'record' =>$bukupertanyaanmodel,
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
            'model' => new BukuPertanyaanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuPertanyaanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuPertanyaanModel saved successfully');
            return redirect()->route('buku_pertanyaan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuPertanyaanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuPertanyaanModel  $bukupertanyaanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuPertanyaanModel $bukupertanyaanmodel)
    {

        return view('pages.buku_pertanyaan.edit', [
            'model' => $bukupertanyaanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuPertanyaanModel  $bukupertanyaanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuPertanyaanModel $bukupertanyaanmodel)
    {
        $bukupertanyaanmodel->fill($request->all());

        if ($bukupertanyaanmodel->save()) {
            
            session()->flash('app_message', 'BukuPertanyaanModel successfully updated');
            return redirect()->route('buku_pertanyaan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuPertanyaanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuPertanyaanModel  $bukupertanyaanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuPertanyaanModel $bukupertanyaanmodel)
    {
        if ($bukupertanyaanmodel->delete()) {
                session()->flash('app_message', 'BukuPertanyaanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuPertanyaanModel');
            }

        return redirect()->back();
    }
}
