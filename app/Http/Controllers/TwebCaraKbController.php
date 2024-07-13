<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TwebCaraKb;


/**
 * Description of TwebCaraKbController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class TwebCaraKbController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return TwebCaraKb::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCaraKb  $twebcarakb
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TwebCaraKb $twebcarakb)
    {
        return view('pages.tweb_cara_kb.show', [
                'record' =>$twebcarakb,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.tweb_cara_kb.create', [
            'model' => new TwebCaraKb,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new TwebCaraKb;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'TwebCaraKb saved successfully');
            return redirect()->route('tweb_cara_kb.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving TwebCaraKb');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  TwebCaraKb  $twebcarakb
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TwebCaraKb $twebcarakb)
    {

        return view('pages.tweb_cara_kb.edit', [
            'model' => $twebcarakb,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  TwebCaraKb  $twebcarakb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,TwebCaraKb $twebcarakb)
    {
        $twebcarakb->fill($request->all());

        if ($twebcarakb->save()) {
            
            session()->flash('app_message', 'TwebCaraKb successfully updated');
            return redirect()->route('tweb_cara_kb.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating TwebCaraKb');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  TwebCaraKb  $twebcarakb
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, TwebCaraKb $twebcarakb)
    {
        if ($twebcarakb->delete()) {
                session()->flash('app_message', 'TwebCaraKb successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting TwebCaraKb');
            }

        return redirect()->back();
    }
}
