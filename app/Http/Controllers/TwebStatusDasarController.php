<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebStatusDasar;


/**
 * Description of TwebStatusDasarController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebStatusDasarController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebStatusDasar::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusDasar  $twebstatusdasar
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebstatusdasar = TwebStatusDasar::find($id);
        if ($twebstatusdasar) {
            return response()->json($twebstatusdasar);
        }
        return response()->json(['message' => 'TwebStatusDasar not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_status_dasar.create', [
            'model' => new TwebStatusDasar,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebStatusDasar;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebStatusDasar saved successfully');
            return redirect()->route('tweb_status_dasar.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebStatusDasar');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebStatusDasar  $twebstatusdasar
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebStatusDasar $twebstatusdasar)
    {

        return view('pages.tweb_status_dasar.edit', [
            'model' => $twebstatusdasar,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebStatusDasar  $twebstatusdasar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebStatusDasar $twebstatusdasar)
    {
        $twebstatusdasar->fill($request->all());

        if ($twebstatusdasar->save()) {
            
            session()->flash('app_message', 'TwebStatusDasar successfully updated');
            return redirect()->route('tweb_status_dasar.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebStatusDasar');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebStatusDasar  $twebstatusdasar
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebStatusDasar $twebstatusdasar)
    {
        if ($twebstatusdasar->delete()) {
                session()->flash('app_message', 'TwebStatusDasar successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebStatusDasar');
            }

        return redirect()->back();
    }
}
