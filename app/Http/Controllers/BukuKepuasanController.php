<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BukuKepuasan;


/**
 * Description of BukuKepuasanController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class BukuKepuasanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return BukuKepuasan::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKepuasan  $bukukepuasan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BukuKepuasan $bukukepuasan)
    {
        return view('pages.buku_kepuasan.show', [
                'record' =>$bukukepuasan,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.buku_kepuasan.create', [
            'model' => new BukuKepuasan,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new BukuKepuasan;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'BukuKepuasan saved successfully');
            return redirect()->route('buku_kepuasan.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving BukuKepuasan');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  BukuKepuasan  $bukukepuasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BukuKepuasan $bukukepuasan)
    {

        return view('pages.buku_kepuasan.edit', [
            'model' => $bukukepuasan,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  BukuKepuasan  $bukukepuasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BukuKepuasan $bukukepuasan)
    {
        $bukukepuasan->fill($request->all());

        if ($bukukepuasan->save()) {
            
            session()->flash('app_message', 'BukuKepuasan successfully updated');
            return redirect()->route('buku_kepuasan.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating BukuKepuasan');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  BukuKepuasan  $bukukepuasan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, BukuKepuasan $bukukepuasan)
    {
        if ($bukukepuasan->delete()) {
                session()->flash('app_message', 'BukuKepuasan successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting BukuKepuasan');
            }

        return redirect()->back();
    }
}
