<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LineModel;


/**
 * Description of LineController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LineController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.line.index', ['records' => LineModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LineModel  $linemodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LineModel $linemodel)
    {
        return view('pages.line.show', [
                'record' =>$linemodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.line.create', [
            'model' => new LineModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LineModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LineModel saved successfully');
            return redirect()->route('line.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LineModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LineModel  $linemodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LineModel $linemodel)
    {

        return view('pages.line.edit', [
            'model' => $linemodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LineModel  $linemodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LineModel $linemodel)
    {
        $linemodel->fill($request->all());

        if ($linemodel->save()) {
            
            session()->flash('app_message', 'LineModel successfully updated');
            return redirect()->route('line.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LineModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LineModel  $linemodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LineModel $linemodel)
    {
        if ($linemodel->delete()) {
                session()->flash('app_message', 'LineModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LineModel');
            }

        return redirect()->back();
    }
}
