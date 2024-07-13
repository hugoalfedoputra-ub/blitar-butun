<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notifikasi;


/**
 * Description of NotifikasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class NotifikasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Notifikasi::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $notifikasi = Notifikasi::find($id);
        if ($notifikasi) {
            return response()->json($notifikasi);
        }
        return response()->json(['message' => 'Notifikasi not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.notifikasi.create', [
            'model' => new Notifikasi,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Notifikasi;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Notifikasi saved successfully');
            return redirect()->route('notifikasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Notifikasi');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Notifikasi $notifikasi)
    {

        return view('pages.notifikasi.edit', [
            'model' => $notifikasi,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Notifikasi $notifikasi)
    {
        $notifikasi->fill($request->all());

        if ($notifikasi->save()) {
            
            session()->flash('app_message', 'Notifikasi successfully updated');
            return redirect()->route('notifikasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Notifikasi');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Notifikasi $notifikasi)
    {
        if ($notifikasi->delete()) {
                session()->flash('app_message', 'Notifikasi successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Notifikasi');
            }

        return redirect()->back();
    }
}
