<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LokasiModel;


/**
 * Description of LokasiController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LokasiController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.lokasi.index', ['records' => LokasiModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LokasiModel  $lokasimodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LokasiModel $lokasimodel)
    {
        return view('pages.lokasi.show', [
                'record' =>$lokasimodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.lokasi.create', [
            'model' => new LokasiModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LokasiModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LokasiModel saved successfully');
            return redirect()->route('lokasi.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LokasiModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LokasiModel  $lokasimodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LokasiModel $lokasimodel)
    {

        return view('pages.lokasi.edit', [
            'model' => $lokasimodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LokasiModel  $lokasimodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LokasiModel $lokasimodel)
    {
        $lokasimodel->fill($request->all());

        if ($lokasimodel->save()) {
            
            session()->flash('app_message', 'LokasiModel successfully updated');
            return redirect()->route('lokasi.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LokasiModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LokasiModel  $lokasimodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LokasiModel $lokasimodel)
    {
        if ($lokasimodel->delete()) {
                session()->flash('app_message', 'LokasiModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LokasiModel');
            }

        return redirect()->back();
    }
}
