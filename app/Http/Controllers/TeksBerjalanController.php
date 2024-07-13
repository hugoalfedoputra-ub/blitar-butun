<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeksBerjalan;


/**
 * Description of TeksBerjalanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TeksBerjalanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.teks_berjalan.index', ['records' => TeksBerjalan::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TeksBerjalan  $teksberjalan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TeksBerjalan $teksberjalan)
    {
        return view('pages.teks_berjalan.show', [
                'record' =>$teksberjalan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.teks_berjalan.create', [
            'model' => new TeksBerjalan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TeksBerjalan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TeksBerjalan saved successfully');
            return redirect()->route('teks_berjalan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TeksBerjalan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TeksBerjalan  $teksberjalan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TeksBerjalan $teksberjalan)
    {

        return view('pages.teks_berjalan.edit', [
            'model' => $teksberjalan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TeksBerjalan  $teksberjalan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TeksBerjalan $teksberjalan)
    {
        $teksberjalan->fill($request->all());

        if ($teksberjalan->save()) {
            
            session()->flash('app_message', 'TeksBerjalan successfully updated');
            return redirect()->route('teks_berjalan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TeksBerjalan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TeksBerjalan  $teksberjalan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TeksBerjalan $teksberjalan)
    {
        if ($teksberjalan->delete()) {
                session()->flash('app_message', 'TeksBerjalan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TeksBerjalan');
            }

        return redirect()->back();
    }
}
