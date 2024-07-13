<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersil;


/**
 * Description of DataPersilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DataPersil::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersil  $datapersil
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $datapersil = DataPersil::find($id);
        if ($datapersil) {
            return response()->json($datapersil);
        }
        return response()->json(['message' => 'DataPersil not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil.create', [
            'model' => new DataPersil,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersil;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersil saved successfully');
            return redirect()->route('data_persil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersil');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersil  $datapersil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersil $datapersil)
    {

        return view('pages.data_persil.edit', [
            'model' => $datapersil,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersil  $datapersil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersil $datapersil)
    {
        $datapersil->fill($request->all());

        if ($datapersil->save()) {
            
            session()->flash('app_message', 'DataPersil successfully updated');
            return redirect()->route('data_persil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersil');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersil  $datapersil
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersil $datapersil)
    {
        if ($datapersil->delete()) {
                session()->flash('app_message', 'DataPersil successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersil');
            }

        return redirect()->back();
    }
}
