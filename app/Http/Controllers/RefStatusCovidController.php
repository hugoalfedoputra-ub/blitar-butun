<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefStatusCovidModel;


/**
 * Description of RefStatusCovidController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RefStatusCovidController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ref_status_covid.index', ['records' => RefStatusCovidModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  RefStatusCovidModel  $refstatuscovidmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RefStatusCovidModel $refstatuscovidmodel)
    {
        return view('pages.ref_status_covid.show', [
                'record' =>$refstatuscovidmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ref_status_covid.create', [
            'model' => new RefStatusCovidModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new RefStatusCovidModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'RefStatusCovidModel saved successfully');
            return redirect()->route('ref_status_covid.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving RefStatusCovidModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  RefStatusCovidModel  $refstatuscovidmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RefStatusCovidModel $refstatuscovidmodel)
    {

        return view('pages.ref_status_covid.edit', [
            'model' => $refstatuscovidmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  RefStatusCovidModel  $refstatuscovidmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RefStatusCovidModel $refstatuscovidmodel)
    {
        $refstatuscovidmodel->fill($request->all());

        if ($refstatuscovidmodel->save()) {
            
            session()->flash('app_message', 'RefStatusCovidModel successfully updated');
            return redirect()->route('ref_status_covid.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating RefStatusCovidModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  RefStatusCovidModel  $refstatuscovidmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, RefStatusCovidModel $refstatuscovidmodel)
    {
        if ($refstatuscovidmodel->delete()) {
                session()->flash('app_message', 'RefStatusCovidModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting RefStatusCovidModel');
            }

        return redirect()->back();
    }
}
