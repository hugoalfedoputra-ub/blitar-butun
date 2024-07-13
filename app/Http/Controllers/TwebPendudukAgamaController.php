<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebPendudukAgamaModel;


/**
 * Description of TwebPendudukAgamaController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebPendudukAgamaController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_penduduk_agama.index', ['records' => TwebPendudukAgamaModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgamaModel  $twebpendudukagamamodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebPendudukAgamaModel $twebpendudukagamamodel)
    {
        return view('pages.tweb_penduduk_agama.show', [
                'record' =>$twebpendudukagamamodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_penduduk_agama.create', [
            'model' => new TwebPendudukAgamaModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebPendudukAgamaModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebPendudukAgamaModel saved successfully');
            return redirect()->route('tweb_penduduk_agama.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebPendudukAgamaModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgamaModel  $twebpendudukagamamodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebPendudukAgamaModel $twebpendudukagamamodel)
    {

        return view('pages.tweb_penduduk_agama.edit', [
            'model' => $twebpendudukagamamodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgamaModel  $twebpendudukagamamodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebPendudukAgamaModel $twebpendudukagamamodel)
    {
        $twebpendudukagamamodel->fill($request->all());

        if ($twebpendudukagamamodel->save()) {
            
            session()->flash('app_message', 'TwebPendudukAgamaModel successfully updated');
            return redirect()->route('tweb_penduduk_agama.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebPendudukAgamaModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebPendudukAgamaModel  $twebpendudukagamamodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebPendudukAgamaModel $twebpendudukagamamodel)
    {
        if ($twebpendudukagamamodel->delete()) {
                session()->flash('app_message', 'TwebPendudukAgamaModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebPendudukAgamaModel');
            }

        return redirect()->back();
    }
}
