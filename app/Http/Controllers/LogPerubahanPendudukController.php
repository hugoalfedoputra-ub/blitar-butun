<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogPerubahanPenduduk;


/**
 * Description of LogPerubahanPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogPerubahanPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return LogPerubahanPenduduk::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogPerubahanPenduduk  $logperubahanpenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogPerubahanPenduduk $logperubahanpenduduk)
    {
        return view('pages.log_perubahan_penduduk.show', [
                'record' =>$logperubahanpenduduk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_perubahan_penduduk.create', [
            'model' => new LogPerubahanPenduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogPerubahanPenduduk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogPerubahanPenduduk saved successfully');
            return redirect()->route('log_perubahan_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogPerubahanPenduduk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogPerubahanPenduduk  $logperubahanpenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogPerubahanPenduduk $logperubahanpenduduk)
    {

        return view('pages.log_perubahan_penduduk.edit', [
            'model' => $logperubahanpenduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogPerubahanPenduduk  $logperubahanpenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogPerubahanPenduduk $logperubahanpenduduk)
    {
        $logperubahanpenduduk->fill($request->all());

        if ($logperubahanpenduduk->save()) {
            
            session()->flash('app_message', 'LogPerubahanPenduduk successfully updated');
            return redirect()->route('log_perubahan_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogPerubahanPenduduk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogPerubahanPenduduk  $logperubahanpenduduk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogPerubahanPenduduk $logperubahanpenduduk)
    {
        if ($logperubahanpenduduk->delete()) {
                session()->flash('app_message', 'LogPerubahanPenduduk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogPerubahanPenduduk');
            }

        return redirect()->back();
    }
}
