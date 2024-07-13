<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Statistics;


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
        return Statistics::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Statistics $statistics)
    {
        return view('pages.statistics.show', [
                'record' =>$statistics,
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
            'model' => new Statistics,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Statistics;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Statistics saved successfully');
            return redirect()->route('statistics.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Statistics');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Statistics $statistics)
    {

        return view('pages.statistics.edit', [
            'model' => $statistics,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Statistics  $statistics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Statistics $statistics)
    {
        $statistics->fill($request->all());

        if ($statistics->save()) {
            
            session()->flash('app_message', 'Statistics successfully updated');
            return redirect()->route('statistics.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Statistics');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Statistics  $statistics
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Statistics $statistics)
    {
        if ($statistics->delete()) {
                session()->flash('app_message', 'Statistics successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Statistics');
            }

        return redirect()->back();
    }
}
