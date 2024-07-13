<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebCaraKbModel;


/**
 * Description of TwebCaraKbController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebCaraKbController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.tweb_cara_kb.index', ['records' => TwebCaraKbModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCaraKbModel  $twebcarakbmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebCaraKbModel $twebcarakbmodel)
    {
        return view('pages.tweb_cara_kb.show', [
                'record' =>$twebcarakbmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_cara_kb.create', [
            'model' => new TwebCaraKbModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebCaraKbModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebCaraKbModel saved successfully');
            return redirect()->route('tweb_cara_kb.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebCaraKbModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCaraKbModel  $twebcarakbmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebCaraKbModel $twebcarakbmodel)
    {

        return view('pages.tweb_cara_kb.edit', [
            'model' => $twebcarakbmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebCaraKbModel  $twebcarakbmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebCaraKbModel $twebcarakbmodel)
    {
        $twebcarakbmodel->fill($request->all());

        if ($twebcarakbmodel->save()) {
            
            session()->flash('app_message', 'TwebCaraKbModel successfully updated');
            return redirect()->route('tweb_cara_kb.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebCaraKbModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebCaraKbModel  $twebcarakbmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebCaraKbModel $twebcarakbmodel)
    {
        if ($twebcarakbmodel->delete()) {
                session()->flash('app_message', 'TwebCaraKbModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebCaraKbModel');
            }

        return redirect()->back();
    }
}
