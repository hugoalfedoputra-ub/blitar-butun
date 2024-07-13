<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeksBerjalanModel;


/**
 * Description of TeksBerjalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TeksBerjalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.teks_berjalan.index', ['records' => TeksBerjalanModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TeksBerjalanModel  $teksberjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TeksBerjalanModel $teksberjalanmodel)
    {
        return view('pages.teks_berjalan.show', [
                'record' =>$teksberjalanmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.teks_berjalan.create', [
            'model' => new TeksBerjalanModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TeksBerjalanModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TeksBerjalanModel saved successfully');
            return redirect()->route('teks_berjalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TeksBerjalanModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TeksBerjalanModel  $teksberjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TeksBerjalanModel $teksberjalanmodel)
    {

        return view('pages.teks_berjalan.edit', [
            'model' => $teksberjalanmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TeksBerjalanModel  $teksberjalanmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TeksBerjalanModel $teksberjalanmodel)
    {
        $teksberjalanmodel->fill($request->all());

        if ($teksberjalanmodel->save()) {
            
            session()->flash('app_message', 'TeksBerjalanModel successfully updated');
            return redirect()->route('teks_berjalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TeksBerjalanModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TeksBerjalanModel  $teksberjalanmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TeksBerjalanModel $teksberjalanmodel)
    {
        if ($teksberjalanmodel->delete()) {
                session()->flash('app_message', 'TeksBerjalanModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TeksBerjalanModel');
            }

        return redirect()->back();
    }
}
