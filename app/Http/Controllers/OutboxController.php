<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Outbox;


/**
 * Description of OutboxController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class OutboxController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Outbox::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Outbox $outbox)
    {
        return view('pages.outbox.show', [
                'record' =>$outbox,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.outbox.create', [
            'model' => new Outbox,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Outbox;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Outbox saved successfully');
            return redirect()->route('outbox.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Outbox');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Outbox $outbox)
    {

        return view('pages.outbox.edit', [
            'model' => $outbox,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Outbox $outbox)
    {
        $outbox->fill($request->all());

        if ($outbox->save()) {
            
            session()->flash('app_message', 'Outbox successfully updated');
            return redirect()->route('outbox.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Outbox');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Outbox  $outbox
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Outbox $outbox)
    {
        if ($outbox->delete()) {
                session()->flash('app_message', 'Outbox successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Outbox');
            }

        return redirect()->back();
    }
}
