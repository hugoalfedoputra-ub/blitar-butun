<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengaduan;


/**
 * Description of PengaduanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PengaduanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Pengaduan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pengaduan $pengaduan)
    {
        return view('pages.pengaduan.show', [
                'record' =>$pengaduan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pengaduan.create', [
            'model' => new Pengaduan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Pengaduan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Pengaduan saved successfully');
            return redirect()->route('pengaduan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Pengaduan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pengaduan $pengaduan)
    {

        return view('pages.pengaduan.edit', [
            'model' => $pengaduan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pengaduan $pengaduan)
    {
        $pengaduan->fill($request->all());

        if ($pengaduan->save()) {
            
            session()->flash('app_message', 'Pengaduan successfully updated');
            return redirect()->route('pengaduan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Pengaduan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Pengaduan $pengaduan)
    {
        if ($pengaduan->delete()) {
                session()->flash('app_message', 'Pengaduan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Pengaduan');
            }

        return redirect()->back();
    }
}
