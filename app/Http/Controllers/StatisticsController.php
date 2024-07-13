<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatisticsModel;


/**
 * Description of StatisticsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class StatisticsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.statistics.index', ['records' => StatisticsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  StatisticsModel  $statisticsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, StatisticsModel $statisticsmodel)
    {
        return view('pages.statistics.show', [
                'record' =>$statisticsmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.statistics.create', [
            'model' => new StatisticsModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new StatisticsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'StatisticsModel saved successfully');
            return redirect()->route('statistics.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving StatisticsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  StatisticsModel  $statisticsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, StatisticsModel $statisticsmodel)
    {

        return view('pages.statistics.edit', [
            'model' => $statisticsmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  StatisticsModel  $statisticsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,StatisticsModel $statisticsmodel)
    {
        $statisticsmodel->fill($request->all());

        if ($statisticsmodel->save()) {
            
            session()->flash('app_message', 'StatisticsModel successfully updated');
            return redirect()->route('statistics.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating StatisticsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  StatisticsModel  $statisticsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, StatisticsModel $statisticsmodel)
    {
        if ($statisticsmodel->delete()) {
                session()->flash('app_message', 'StatisticsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting StatisticsModel');
            }

        return redirect()->back();
    }
}
