<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sentitems;


/**
 * Description of SentitemsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SentitemsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Sentitems::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Sentitems  $sentitems
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sentitems $sentitems)
    {
        return view('pages.sentitems.show', [
                'record' =>$sentitems,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.sentitems.create', [
            'model' => new Sentitems,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Sentitems;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Sentitems saved successfully');
            return redirect()->route('sentitems.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Sentitems');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Sentitems  $sentitems
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sentitems $sentitems)
    {

        return view('pages.sentitems.edit', [
            'model' => $sentitems,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Sentitems  $sentitems
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Sentitems $sentitems)
    {
        $sentitems->fill($request->all());

        if ($sentitems->save()) {
            
            session()->flash('app_message', 'Sentitems successfully updated');
            return redirect()->route('sentitems.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Sentitems');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Sentitems  $sentitems
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Sentitems $sentitems)
    {
        if ($sentitems->delete()) {
                session()->flash('app_message', 'Sentitems successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Sentitems');
            }

        return redirect()->back();
    }
}
