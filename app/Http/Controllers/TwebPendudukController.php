<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPenduduk;


/**
 * Description of TwebPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk.index', ['records' => TwebPenduduk::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPenduduk  $twebpenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPenduduk $twebpenduduk)
    {
        return view('pages.tweb_penduduk.show', [
                'record' =>$twebpenduduk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk.create', [
            'model' => new TwebPenduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPenduduk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPenduduk saved successfully');
            return redirect()->route('tweb_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPenduduk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPenduduk  $twebpenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPenduduk $twebpenduduk)
    {

        return view('pages.tweb_penduduk.edit', [
            'model' => $twebpenduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPenduduk  $twebpenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPenduduk $twebpenduduk)
    {
        $twebpenduduk->fill($request->all());

        if ($twebpenduduk->save()) {
            
            session()->flash('app_message', 'TwebPenduduk successfully updated');
            return redirect()->route('tweb_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPenduduk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPenduduk  $twebpenduduk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPenduduk $twebpenduduk)
    {
        if ($twebpenduduk->delete()) {
                session()->flash('app_message', 'TwebPenduduk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPenduduk');
            }

        return redirect()->back();
    }
}
