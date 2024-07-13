<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Migrasi;


/**
 * Description of MigrasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class MigrasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Migrasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Migrasi  $migrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Migrasi $migrasi)
    {
        return view('pages.migrasi.show', [
                'record' =>$migrasi,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.migrasi.create', [
            'model' => new Migrasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Migrasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Migrasi saved successfully');
            return redirect()->route('migrasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Migrasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Migrasi  $migrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Migrasi $migrasi)
    {

        return view('pages.migrasi.edit', [
            'model' => $migrasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Migrasi  $migrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Migrasi $migrasi)
    {
        $migrasi->fill($request->all());

        if ($migrasi->save()) {
            
            session()->flash('app_message', 'Migrasi successfully updated');
            return redirect()->route('migrasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Migrasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Migrasi  $migrasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Migrasi $migrasi)
    {
        if ($migrasi->delete()) {
                session()->flash('app_message', 'Migrasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Migrasi');
            }

        return redirect()->back();
    }
}
