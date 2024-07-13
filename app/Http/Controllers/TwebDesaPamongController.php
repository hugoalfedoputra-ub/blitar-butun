<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebDesaPamongModel;


/**
 * Description of TwebDesaPamongController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebDesaPamongController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_desa_pamong.index', ['records' => TwebDesaPamongModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebDesaPamongModel  $twebdesapamongmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebDesaPamongModel $twebdesapamongmodel)
    {
        return view('pages.tweb_desa_pamong.show', [
                'record' =>$twebdesapamongmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_desa_pamong.create', [
            'model' => new TwebDesaPamongModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebDesaPamongModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebDesaPamongModel saved successfully');
            return redirect()->route('tweb_desa_pamong.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebDesaPamongModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebDesaPamongModel  $twebdesapamongmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebDesaPamongModel $twebdesapamongmodel)
    {

        return view('pages.tweb_desa_pamong.edit', [
            'model' => $twebdesapamongmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebDesaPamongModel  $twebdesapamongmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebDesaPamongModel $twebdesapamongmodel)
    {
        $twebdesapamongmodel->fill($request->all());

        if ($twebdesapamongmodel->save()) {
            
            session()->flash('app_message', 'TwebDesaPamongModel successfully updated');
            return redirect()->route('tweb_desa_pamong.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebDesaPamongModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebDesaPamongModel  $twebdesapamongmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebDesaPamongModel $twebdesapamongmodel)
    {
        if ($twebdesapamongmodel->delete()) {
                session()->flash('app_message', 'TwebDesaPamongModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebDesaPamongModel');
            }

        return redirect()->back();
    }
}
