<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SentitemsModel;


/**
 * Description of SentitemsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SentitemsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.sentitems.index', ['records' => SentitemsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  SentitemsModel  $sentitemsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, SentitemsModel $sentitemsmodel)
    {
        return view('pages.sentitems.show', [
                'record' =>$sentitemsmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.sentitems.create', [
            'model' => new SentitemsModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new SentitemsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SentitemsModel saved successfully');
            return redirect()->route('sentitems.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SentitemsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  SentitemsModel  $sentitemsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SentitemsModel $sentitemsmodel)
    {

        return view('pages.sentitems.edit', [
            'model' => $sentitemsmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  SentitemsModel  $sentitemsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SentitemsModel $sentitemsmodel)
    {
        $sentitemsmodel->fill($request->all());

        if ($sentitemsmodel->save()) {
            
            session()->flash('app_message', 'SentitemsModel successfully updated');
            return redirect()->route('sentitems.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SentitemsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  SentitemsModel  $sentitemsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, SentitemsModel $sentitemsmodel)
    {
        if ($sentitemsmodel->delete()) {
                session()->flash('app_message', 'SentitemsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SentitemsModel');
            }

        return redirect()->back();
    }
}
