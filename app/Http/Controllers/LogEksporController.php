<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogEkspor;


/**
 * Description of LogEksporController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogEksporController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return LogEkspor::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogEkspor  $logekspor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogEkspor $logekspor)
    {
        return view('pages.log_ekspor.show', [
                'record' =>$logekspor,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_ekspor.create', [
            'model' => new LogEkspor,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogEkspor;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogEkspor saved successfully');
            return redirect()->route('log_ekspor.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogEkspor');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogEkspor  $logekspor
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogEkspor $logekspor)
    {

        return view('pages.log_ekspor.edit', [
            'model' => $logekspor,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogEkspor  $logekspor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogEkspor $logekspor)
    {
        $logekspor->fill($request->all());

        if ($logekspor->save()) {
            
            session()->flash('app_message', 'LogEkspor successfully updated');
            return redirect()->route('log_ekspor.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogEkspor');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogEkspor  $logekspor
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogEkspor $logekspor)
    {
        if ($logekspor->delete()) {
                session()->flash('app_message', 'LogEkspor successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogEkspor');
            }

        return redirect()->back();
    }
}
