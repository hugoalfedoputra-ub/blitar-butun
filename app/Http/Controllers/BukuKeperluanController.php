<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuKeperluanModel;


/**
 * Description of BukuKeperluanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuKeperluanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.buku_keperluan.index', ['records' => BukuKeperluanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKeperluanModel  $bukukeperluanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuKeperluanModel $bukukeperluanmodel)
    {
        return view('pages.buku_keperluan.show', [
                'record' =>$bukukeperluanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_keperluan.create', [
            'model' => new BukuKeperluanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuKeperluanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuKeperluanModel saved successfully');
            return redirect()->route('buku_keperluan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuKeperluanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKeperluanModel  $bukukeperluanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuKeperluanModel $bukukeperluanmodel)
    {

        return view('pages.buku_keperluan.edit', [
            'model' => $bukukeperluanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuKeperluanModel  $bukukeperluanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuKeperluanModel $bukukeperluanmodel)
    {
        $bukukeperluanmodel->fill($request->all());

        if ($bukukeperluanmodel->save()) {
            
            session()->flash('app_message', 'BukuKeperluanModel successfully updated');
            return redirect()->route('buku_keperluan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuKeperluanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuKeperluanModel  $bukukeperluanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuKeperluanModel $bukukeperluanmodel)
    {
        if ($bukukeperluanmodel->delete()) {
                session()->flash('app_message', 'BukuKeperluanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuKeperluanModel');
            }

        return redirect()->back();
    }
}
