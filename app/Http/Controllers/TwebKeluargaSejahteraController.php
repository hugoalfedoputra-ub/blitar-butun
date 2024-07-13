<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebKeluargaSejahteraModel;


/**
 * Description of TwebKeluargaSejahteraController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebKeluargaSejahteraController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_keluarga_sejahtera.index', ['records' => TwebKeluargaSejahteraModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahteraModel  $twebkeluargasejahteramodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebKeluargaSejahteraModel $twebkeluargasejahteramodel)
    {
        return view('pages.tweb_keluarga_sejahtera.show', [
                'record' =>$twebkeluargasejahteramodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_keluarga_sejahtera.create', [
            'model' => new TwebKeluargaSejahteraModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebKeluargaSejahteraModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebKeluargaSejahteraModel saved successfully');
            return redirect()->route('tweb_keluarga_sejahtera.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebKeluargaSejahteraModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahteraModel  $twebkeluargasejahteramodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebKeluargaSejahteraModel $twebkeluargasejahteramodel)
    {

        return view('pages.tweb_keluarga_sejahtera.edit', [
            'model' => $twebkeluargasejahteramodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahteraModel  $twebkeluargasejahteramodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebKeluargaSejahteraModel $twebkeluargasejahteramodel)
    {
        $twebkeluargasejahteramodel->fill($request->all());

        if ($twebkeluargasejahteramodel->save()) {
            
            session()->flash('app_message', 'TwebKeluargaSejahteraModel successfully updated');
            return redirect()->route('tweb_keluarga_sejahtera.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebKeluargaSejahteraModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebKeluargaSejahteraModel  $twebkeluargasejahteramodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebKeluargaSejahteraModel $twebkeluargasejahteramodel)
    {
        if ($twebkeluargasejahteramodel->delete()) {
                session()->flash('app_message', 'TwebKeluargaSejahteraModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebKeluargaSejahteraModel');
            }

        return redirect()->back();
    }
}
