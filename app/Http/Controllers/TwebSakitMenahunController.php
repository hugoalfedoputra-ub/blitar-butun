<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebSakitMenahunModel;


/**
 * Description of TwebSakitMenahunController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebSakitMenahunController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_sakit_menahun.index', ['records' => TwebSakitMenahunModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahunModel  $twebsakitmenahunmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebSakitMenahunModel $twebsakitmenahunmodel)
    {
        return view('pages.tweb_sakit_menahun.show', [
                'record' =>$twebsakitmenahunmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_sakit_menahun.create', [
            'model' => new TwebSakitMenahunModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebSakitMenahunModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebSakitMenahunModel saved successfully');
            return redirect()->route('tweb_sakit_menahun.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebSakitMenahunModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahunModel  $twebsakitmenahunmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebSakitMenahunModel $twebsakitmenahunmodel)
    {

        return view('pages.tweb_sakit_menahun.edit', [
            'model' => $twebsakitmenahunmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahunModel  $twebsakitmenahunmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebSakitMenahunModel $twebsakitmenahunmodel)
    {
        $twebsakitmenahunmodel->fill($request->all());

        if ($twebsakitmenahunmodel->save()) {
            
            session()->flash('app_message', 'TwebSakitMenahunModel successfully updated');
            return redirect()->route('tweb_sakit_menahun.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebSakitMenahunModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebSakitMenahunModel  $twebsakitmenahunmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebSakitMenahunModel $twebsakitmenahunmodel)
    {
        if ($twebsakitmenahunmodel->delete()) {
                session()->flash('app_message', 'TwebSakitMenahunModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebSakitMenahunModel');
            }

        return redirect()->back();
    }
}
