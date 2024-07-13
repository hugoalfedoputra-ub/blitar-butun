<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukStatus;


/**
 * Description of TwebPendudukStatusController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukStatusController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebPendudukStatus::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatus  $twebpendudukstatus
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebpendudukstatus = TwebPendudukStatus::find($id);
        if ($twebpendudukstatus) {
            return response()->json($twebpendudukstatus);
        }
        return response()->json(['message' => 'TwebPendudukStatus not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_status.create', [
            'model' => new TwebPendudukStatus,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukStatus;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukStatus saved successfully');
            return redirect()->route('tweb_penduduk_status.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukStatus');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatus  $twebpendudukstatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukStatus $twebpendudukstatus)
    {

        return view('pages.tweb_penduduk_status.edit', [
            'model' => $twebpendudukstatus,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatus  $twebpendudukstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukStatus $twebpendudukstatus)
    {
        $twebpendudukstatus->fill($request->all());

        if ($twebpendudukstatus->save()) {
            
            session()->flash('app_message', 'TwebPendudukStatus successfully updated');
            return redirect()->route('tweb_penduduk_status.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukStatus');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukStatus  $twebpendudukstatus
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukStatus $twebpendudukstatus)
    {
        if ($twebpendudukstatus->delete()) {
                session()->flash('app_message', 'TwebPendudukStatus successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukStatus');
            }

        return redirect()->back();
    }
}
