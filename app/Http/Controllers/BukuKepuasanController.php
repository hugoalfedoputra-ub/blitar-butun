<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuKepuasanModel;


/**
 * Description of BukuKepuasanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuKepuasanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.buku_kepuasan.index', ['records' => BukuKepuasanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKepuasanModel  $bukukepuasanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuKepuasanModel $bukukepuasanmodel)
    {
        return view('pages.buku_kepuasan.show', [
                'record' =>$bukukepuasanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_kepuasan.create', [
            'model' => new BukuKepuasanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuKepuasanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuKepuasanModel saved successfully');
            return redirect()->route('buku_kepuasan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuKepuasanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKepuasanModel  $bukukepuasanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuKepuasanModel $bukukepuasanmodel)
    {

        return view('pages.buku_kepuasan.edit', [
            'model' => $bukukepuasanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuKepuasanModel  $bukukepuasanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuKepuasanModel $bukukepuasanmodel)
    {
        $bukukepuasanmodel->fill($request->all());

        if ($bukukepuasanmodel->save()) {
            
            session()->flash('app_message', 'BukuKepuasanModel successfully updated');
            return redirect()->route('buku_kepuasan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuKepuasanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuKepuasanModel  $bukukepuasanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuKepuasanModel $bukukepuasanmodel)
    {
        if ($bukukepuasanmodel->delete()) {
                session()->flash('app_message', 'BukuKepuasanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuKepuasanModel');
            }

        return redirect()->back();
    }
}
