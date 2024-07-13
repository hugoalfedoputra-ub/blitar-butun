<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukMap;


/**
 * Description of TwebPendudukMapController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukMapController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukMap::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMap  $twebpendudukmap
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebpendudukmap = TwebPendudukMap::find($id);
        if ($twebpendudukmap) {
            return response()->json($twebpendudukmap);
        }
        return response()->json(['message' => 'TwebPendudukMap not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_map.create', [
            'model' => new TwebPendudukMap,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukMap;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukMap saved successfully');
            return redirect()->route('tweb_penduduk_map.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukMap');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukMap  $twebpendudukmap
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukMap $twebpendudukmap)
    {

        return view('pages.tweb_penduduk_map.edit', [
            'model' => $twebpendudukmap,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMap  $twebpendudukmap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukMap $twebpendudukmap)
    {
        $twebpendudukmap->fill($request->all());

        if ($twebpendudukmap->save()) {
            
            session()->flash('app_message', 'TwebPendudukMap successfully updated');
            return redirect()->route('tweb_penduduk_map.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukMap');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukMap  $twebpendudukmap
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukMap $twebpendudukmap)
    {
        if ($twebpendudukmap->delete()) {
                session()->flash('app_message', 'TwebPendudukMap successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukMap');
            }

        return redirect()->back();
    }
}
