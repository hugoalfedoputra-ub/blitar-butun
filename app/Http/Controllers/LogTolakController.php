<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogTolak;


/**
 * Description of LogTolakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogTolakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return LogTolak::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogTolak  $logtolak
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogTolak $logtolak)
    {
        return view('pages.log_tolak.show', [
                'record' =>$logtolak,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_tolak.create', [
            'model' => new LogTolak,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogTolak;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogTolak saved successfully');
            return redirect()->route('log_tolak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogTolak');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogTolak  $logtolak
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogTolak $logtolak)
    {

        return view('pages.log_tolak.edit', [
            'model' => $logtolak,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogTolak  $logtolak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogTolak $logtolak)
    {
        $logtolak->fill($request->all());

        if ($logtolak->save()) {
            
            session()->flash('app_message', 'LogTolak successfully updated');
            return redirect()->route('log_tolak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogTolak');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogTolak  $logtolak
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogTolak $logtolak)
    {
        if ($logtolak->delete()) {
                session()->flash('app_message', 'LogTolak successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogTolak');
            }

        return redirect()->back();
    }
}
