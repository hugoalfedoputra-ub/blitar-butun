<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InboxModel;


/**
 * Description of InboxController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class InboxController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.inbox.index', ['records' => InboxModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  InboxModel  $inboxmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, InboxModel $inboxmodel)
    {
        return view('pages.inbox.show', [
                'record' =>$inboxmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.inbox.create', [
            'model' => new InboxModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new InboxModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'InboxModel saved successfully');
            return redirect()->route('inbox.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving InboxModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  InboxModel  $inboxmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, InboxModel $inboxmodel)
    {

        return view('pages.inbox.edit', [
            'model' => $inboxmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  InboxModel  $inboxmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,InboxModel $inboxmodel)
    {
        $inboxmodel->fill($request->all());

        if ($inboxmodel->save()) {
            
            session()->flash('app_message', 'InboxModel successfully updated');
            return redirect()->route('inbox.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating InboxModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  InboxModel  $inboxmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, InboxModel $inboxmodel)
    {
        if ($inboxmodel->delete()) {
                session()->flash('app_message', 'InboxModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting InboxModel');
            }

        return redirect()->back();
    }
}
