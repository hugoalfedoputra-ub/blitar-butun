<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogHapusPenduduk;


/**
 * Description of LogHapusPendudukController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LogHapusPendudukController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.log_hapus_penduduk.index', ['records' => LogHapusPenduduk::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LogHapusPenduduk  $loghapuspenduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LogHapusPenduduk $loghapuspenduduk)
    {
        return view('pages.log_hapus_penduduk.show', [
                'record' =>$loghapuspenduduk,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.log_hapus_penduduk.create', [
            'model' => new LogHapusPenduduk,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LogHapusPenduduk;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LogHapusPenduduk saved successfully');
            return redirect()->route('log_hapus_penduduk.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LogHapusPenduduk');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LogHapusPenduduk  $loghapuspenduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LogHapusPenduduk $loghapuspenduduk)
    {

        return view('pages.log_hapus_penduduk.edit', [
            'model' => $loghapuspenduduk,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LogHapusPenduduk  $loghapuspenduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LogHapusPenduduk $loghapuspenduduk)
    {
        $loghapuspenduduk->fill($request->all());

        if ($loghapuspenduduk->save()) {
            
            session()->flash('app_message', 'LogHapusPenduduk successfully updated');
            return redirect()->route('log_hapus_penduduk.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LogHapusPenduduk');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LogHapusPenduduk  $loghapuspenduduk
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LogHapusPenduduk $loghapuspenduduk)
    {
        if ($loghapuspenduduk->delete()) {
                session()->flash('app_message', 'LogHapusPenduduk successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LogHapusPenduduk');
            }

        return redirect()->back();
    }
}
