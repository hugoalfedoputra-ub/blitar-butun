<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OutboxModel;


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
        return view('pages.outbox.index', ['records' => OutboxModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  OutboxModel  $outboxmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OutboxModel $outboxmodel)
    {
        return view('pages.outbox.show', [
                'record' =>$outboxmodel,
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
            'model' => new OutboxModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new OutboxModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'OutboxModel saved successfully');
            return redirect()->route('outbox.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving OutboxModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  OutboxModel  $outboxmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, OutboxModel $outboxmodel)
    {

        return view('pages.outbox.edit', [
            'model' => $outboxmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  OutboxModel  $outboxmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,OutboxModel $outboxmodel)
    {
        $outboxmodel->fill($request->all());

        if ($outboxmodel->save()) {
            
            session()->flash('app_message', 'OutboxModel successfully updated');
            return redirect()->route('outbox.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating OutboxModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  OutboxModel  $outboxmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, OutboxModel $outboxmodel)
    {
        if ($outboxmodel->delete()) {
                session()->flash('app_message', 'OutboxModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting OutboxModel');
            }

        return redirect()->back();
    }
}
