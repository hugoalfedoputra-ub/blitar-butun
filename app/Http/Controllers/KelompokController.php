<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelompokModel;


/**
 * Description of KelompokController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class KelompokController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.kelompok.index', ['records' => KelompokModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokModel  $kelompokmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, KelompokModel $kelompokmodel)
    {
        return view('pages.kelompok.show', [
                'record' =>$kelompokmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.kelompok.create', [
            'model' => new KelompokModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new KelompokModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'KelompokModel saved successfully');
            return redirect()->route('kelompok.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving KelompokModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  KelompokModel  $kelompokmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, KelompokModel $kelompokmodel)
    {

        return view('pages.kelompok.edit', [
            'model' => $kelompokmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  KelompokModel  $kelompokmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,KelompokModel $kelompokmodel)
    {
        $kelompokmodel->fill($request->all());

        if ($kelompokmodel->save()) {
            
            session()->flash('app_message', 'KelompokModel successfully updated');
            return redirect()->route('kelompok.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating KelompokModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  KelompokModel  $kelompokmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, KelompokModel $kelompokmodel)
    {
        if ($kelompokmodel->delete()) {
                session()->flash('app_message', 'KelompokModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting KelompokModel');
            }

        return redirect()->back();
    }
}
