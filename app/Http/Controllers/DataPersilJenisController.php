<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPersilJenis;


/**
 * Description of DataPersilJenisController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class DataPersilJenisController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DataPersilJenis::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilJenis  $datapersiljenis
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $datapersiljenis = DataPersilJenis::find($id);
        if ($datapersiljenis) {
            return response()->json($datapersiljenis);
        }
        return response()->json(['message' => 'DataPersilJenis not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.data_persil_jenis.create', [
            'model' => new DataPersilJenis,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new DataPersilJenis;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'DataPersilJenis saved successfully');
            return redirect()->route('data_persil_jenis.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving DataPersilJenis');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  DataPersilJenis  $datapersiljenis
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DataPersilJenis $datapersiljenis)
    {

        return view('pages.data_persil_jenis.edit', [
            'model' => $datapersiljenis,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  DataPersilJenis  $datapersiljenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DataPersilJenis $datapersiljenis)
    {
        $datapersiljenis->fill($request->all());

        if ($datapersiljenis->save()) {
            
            session()->flash('app_message', 'DataPersilJenis successfully updated');
            return redirect()->route('data_persil_jenis.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating DataPersilJenis');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  DataPersilJenis  $datapersiljenis
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, DataPersilJenis $datapersiljenis)
    {
        if ($datapersiljenis->delete()) {
                session()->flash('app_message', 'DataPersilJenis successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting DataPersilJenis');
            }

        return redirect()->back();
    }
}
