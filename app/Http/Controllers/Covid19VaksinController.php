<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Covid19VaksinModel;


/**
 * Description of Covid19VaksinController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class Covid19VaksinController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.covid19_vaksin.index', ['records' => Covid19VaksinModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19VaksinModel  $covid19vaksinmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Covid19VaksinModel $covid19vaksinmodel)
    {
        return view('pages.covid19_vaksin.show', [
                'record' =>$covid19vaksinmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.covid19_vaksin.create', [
            'model' => new Covid19VaksinModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Covid19VaksinModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Covid19VaksinModel saved successfully');
            return redirect()->route('covid19_vaksin.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Covid19VaksinModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Covid19VaksinModel  $covid19vaksinmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Covid19VaksinModel $covid19vaksinmodel)
    {

        return view('pages.covid19_vaksin.edit', [
            'model' => $covid19vaksinmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Covid19VaksinModel  $covid19vaksinmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Covid19VaksinModel $covid19vaksinmodel)
    {
        $covid19vaksinmodel->fill($request->all());

        if ($covid19vaksinmodel->save()) {
            
            session()->flash('app_message', 'Covid19VaksinModel successfully updated');
            return redirect()->route('covid19_vaksin.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Covid19VaksinModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Covid19VaksinModel  $covid19vaksinmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Covid19VaksinModel $covid19vaksinmodel)
    {
        if ($covid19vaksinmodel->delete()) {
                session()->flash('app_message', 'Covid19VaksinModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Covid19VaksinModel');
            }

        return redirect()->back();
    }
}
