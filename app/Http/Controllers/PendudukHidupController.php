<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendudukHidup;


/**
 * Description of PendudukHidupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PendudukHidupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PendudukHidup::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PendudukHidup  $pendudukhidup
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PendudukHidup $pendudukhidup)
    {
        return view('pages.penduduk_hidup.show', [
                'record' =>$pendudukhidup,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.penduduk_hidup.create', [
            'model' => new PendudukHidup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PendudukHidup;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PendudukHidup saved successfully');
            return redirect()->route('penduduk_hidup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PendudukHidup');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PendudukHidup  $pendudukhidup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PendudukHidup $pendudukhidup)
    {

        return view('pages.penduduk_hidup.edit', [
            'model' => $pendudukhidup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PendudukHidup  $pendudukhidup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PendudukHidup $pendudukhidup)
    {
        $pendudukhidup->fill($request->all());

        if ($pendudukhidup->save()) {
            
            session()->flash('app_message', 'PendudukHidup successfully updated');
            return redirect()->route('penduduk_hidup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PendudukHidup');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PendudukHidup  $pendudukhidup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PendudukHidup $pendudukhidup)
    {
        if ($pendudukhidup->delete()) {
                session()->flash('app_message', 'PendudukHidup successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PendudukHidup');
            }

        return redirect()->back();
    }
}
