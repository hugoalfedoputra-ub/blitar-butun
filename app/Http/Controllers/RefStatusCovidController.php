<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefStatusCovid;


/**
 * Description of RefStatusCovidController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefStatusCovidController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return RefStatusCovid::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefStatusCovid  $refstatuscovid
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $refstatuscovid = RefStatusCovid::find($id);
        if ($refstatuscovid) {
            return response()->json($refstatuscovid);
        }
        return response()->json(['message' => 'RefStatusCovid not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_status_covid.create', [
            'model' => new RefStatusCovid,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefStatusCovid;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefStatusCovid saved successfully');
            return redirect()->route('ref_status_covid.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefStatusCovid');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefStatusCovid  $refstatuscovid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefStatusCovid $refstatuscovid)
    {

        return view('pages.ref_status_covid.edit', [
            'model' => $refstatuscovid,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefStatusCovid  $refstatuscovid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefStatusCovid $refstatuscovid)
    {
        $refstatuscovid->fill($request->all());

        if ($refstatuscovid->save()) {
            
            session()->flash('app_message', 'RefStatusCovid successfully updated');
            return redirect()->route('ref_status_covid.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefStatusCovid');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefStatusCovid  $refstatuscovid
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefStatusCovid $refstatuscovid)
    {
        if ($refstatuscovid->delete()) {
                session()->flash('app_message', 'RefStatusCovid successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefStatusCovid');
            }

        return redirect()->back();
    }
}
