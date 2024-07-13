<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogPenduduk;
use App\Models\RefPindah;


/**
 * Description of LogPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return LogPenduduk::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogPenduduk  $logpenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogPenduduk $logpenduduk)
    {
        return view('pages.log_penduduk.show', [
                'record' =>$logpenduduk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$ref_pindah = RefPindah::all(['id']);

        return view('pages.log_penduduk.create', [
            'model' => new LogPenduduk,
			"ref_pindah" => $ref_pindah,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogPenduduk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogPenduduk saved successfully');
            return redirect()->route('log_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogPenduduk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogPenduduk  $logpenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogPenduduk $logpenduduk)
    {
		$ref_pindah = RefPindah::all(['id']);

        return view('pages.log_penduduk.edit', [
            'model' => $logpenduduk,
			"ref_pindah" => $ref_pindah,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogPenduduk  $logpenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogPenduduk $logpenduduk)
    {
        $logpenduduk->fill($request->all());

        if ($logpenduduk->save()) {
            
            session()->flash('app_message', 'LogPenduduk successfully updated');
            return redirect()->route('log_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogPenduduk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogPenduduk  $logpenduduk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogPenduduk $logpenduduk)
    {
        if ($logpenduduk->delete()) {
                session()->flash('app_message', 'LogPenduduk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogPenduduk');
            }

        return redirect()->back();
    }
}
