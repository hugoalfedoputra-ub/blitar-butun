<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuKeperluan;


/**
 * Description of BukuKeperluanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuKeperluanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return BukuKeperluan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKeperluan  $bukukeperluan
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $bukukeperluan = BukuKeperluan::find($id);
        if ($bukukeperluan) {
            return response()->json($bukukeperluan);
        }
        return response()->json(['message' => 'BukuKeperluan not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_keperluan.create', [
            'model' => new BukuKeperluan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuKeperluan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuKeperluan saved successfully');
            return redirect()->route('buku_keperluan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuKeperluan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKeperluan  $bukukeperluan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuKeperluan $bukukeperluan)
    {

        return view('pages.buku_keperluan.edit', [
            'model' => $bukukeperluan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuKeperluan  $bukukeperluan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuKeperluan $bukukeperluan)
    {
        $bukukeperluan->fill($request->all());

        if ($bukukeperluan->save()) {
            
            session()->flash('app_message', 'BukuKeperluan successfully updated');
            return redirect()->route('buku_keperluan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuKeperluan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuKeperluan  $bukukeperluan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuKeperluan $bukukeperluan)
    {
        if ($bukukeperluan->delete()) {
                session()->flash('app_message', 'BukuKeperluan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuKeperluan');
            }

        return redirect()->back();
    }
}
