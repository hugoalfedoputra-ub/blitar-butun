<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukKawin;


/**
 * Description of TwebPendudukKawinController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukKawinController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukKawin::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawin  $twebpendudukkawin
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebpendudukkawin = TwebPendudukKawin::find($id);
        if ($twebpendudukkawin) {
            return response()->json($twebpendudukkawin);
        }
        return response()->json(['message' => 'TwebPendudukKawin not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_kawin.create', [
            'model' => new TwebPendudukKawin,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukKawin;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukKawin saved successfully');
            return redirect()->route('tweb_penduduk_kawin.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukKawin');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawin  $twebpendudukkawin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukKawin $twebpendudukkawin)
    {

        return view('pages.tweb_penduduk_kawin.edit', [
            'model' => $twebpendudukkawin,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawin  $twebpendudukkawin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukKawin $twebpendudukkawin)
    {
        $twebpendudukkawin->fill($request->all());

        if ($twebpendudukkawin->save()) {
            
            session()->flash('app_message', 'TwebPendudukKawin successfully updated');
            return redirect()->route('tweb_penduduk_kawin.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukKawin');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukKawin  $twebpendudukkawin
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukKawin $twebpendudukkawin)
    {
        if ($twebpendudukkawin->delete()) {
                session()->flash('app_message', 'TwebPendudukKawin successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukKawin');
            }

        return redirect()->back();
    }
}
