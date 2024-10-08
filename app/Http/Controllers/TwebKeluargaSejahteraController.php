<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebKeluargaSejahtera;


/**
 * Description of TwebKeluargaSejahteraController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebKeluargaSejahteraController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebKeluargaSejahtera::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahtera  $twebkeluargasejahtera
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $twebkeluargasejahtera = TwebKeluargaSejahtera::find($id);
        if ($twebkeluargasejahtera) {
            return response()->json($twebkeluargasejahtera);
        }
        return response()->json(['message' => 'TwebKeluargaSejahtera not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_keluarga_sejahtera.create', [
            'model' => new TwebKeluargaSejahtera,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebKeluargaSejahtera;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebKeluargaSejahtera saved successfully');
            return redirect()->route('tweb_keluarga_sejahtera.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebKeluargaSejahtera');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahtera  $twebkeluargasejahtera
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebKeluargaSejahtera $twebkeluargasejahtera)
    {

        return view('pages.tweb_keluarga_sejahtera.edit', [
            'model' => $twebkeluargasejahtera,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahtera  $twebkeluargasejahtera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebKeluargaSejahtera $twebkeluargasejahtera)
    {
        $twebkeluargasejahtera->fill($request->all());

        if ($twebkeluargasejahtera->save()) {
            
            session()->flash('app_message', 'TwebKeluargaSejahtera successfully updated');
            return redirect()->route('tweb_keluarga_sejahtera.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebKeluargaSejahtera');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahtera  $twebkeluargasejahtera
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebKeluargaSejahtera $twebkeluargasejahtera)
    {
        if ($twebkeluargasejahtera->delete()) {
                session()->flash('app_message', 'TwebKeluargaSejahtera successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebKeluargaSejahtera');
            }

        return redirect()->back();
    }
}
