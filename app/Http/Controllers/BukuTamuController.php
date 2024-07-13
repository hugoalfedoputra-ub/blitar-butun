<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuTamuModel;


/**
 * Description of BukuTamuController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuTamuController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.buku_tamu.index', ['records' => BukuTamuModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuTamuModel  $bukutamumodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuTamuModel $bukutamumodel)
    {
        return view('pages.buku_tamu.show', [
                'record' =>$bukutamumodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_tamu.create', [
            'model' => new BukuTamuModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuTamuModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuTamuModel saved successfully');
            return redirect()->route('buku_tamu.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuTamuModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuTamuModel  $bukutamumodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuTamuModel $bukutamumodel)
    {

        return view('pages.buku_tamu.edit', [
            'model' => $bukutamumodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuTamuModel  $bukutamumodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuTamuModel $bukutamumodel)
    {
        $bukutamumodel->fill($request->all());

        if ($bukutamumodel->save()) {
            
            session()->flash('app_message', 'BukuTamuModel successfully updated');
            return redirect()->route('buku_tamu.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuTamuModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuTamuModel  $bukutamumodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuTamuModel $bukutamumodel)
    {
        if ($bukutamumodel->delete()) {
                session()->flash('app_message', 'BukuTamuModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuTamuModel');
            }

        return redirect()->back();
    }
}
