<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataSurat;


/**
 * Description of DataSuratController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataSuratController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DataSurat::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataSurat  $datasurat
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $datasurat = DataSurat::find($id);
        if ($datasurat) {
            return response()->json($datasurat);
        }
        return response()->json(['message' => 'DataSurat not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_surat.create', [
            'model' => new DataSurat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataSurat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataSurat saved successfully');
            return redirect()->route('data_surat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataSurat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataSurat  $datasurat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataSurat $datasurat)
    {

        return view('pages.data_surat.edit', [
            'model' => $datasurat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataSurat  $datasurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataSurat $datasurat)
    {
        $datasurat->fill($request->all());

        if ($datasurat->save()) {
            
            session()->flash('app_message', 'DataSurat successfully updated');
            return redirect()->route('data_surat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataSurat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataSurat  $datasurat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataSurat $datasurat)
    {
        if ($datasurat->delete()) {
                session()->flash('app_message', 'DataSurat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataSurat');
            }

        return redirect()->back();
    }
}
