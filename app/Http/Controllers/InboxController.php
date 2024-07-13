<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inbox;


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
        return view('pages.inbox.index', ['records' => Inbox::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Inbox $inbox)
    {
        return view('pages.inbox.show', [
                'record' =>$inbox,
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
            'model' => new Inbox,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Inbox;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Inbox saved successfully');
            return redirect()->route('inbox.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Inbox');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Inbox $inbox)
    {

        return view('pages.inbox.edit', [
            'model' => $inbox,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Inbox $inbox)
    {
        $inbox->fill($request->all());

        if ($inbox->save()) {
            
            session()->flash('app_message', 'Inbox successfully updated');
            return redirect()->route('inbox.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Inbox');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Inbox  $inbox
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Inbox $inbox)
    {
        if ($inbox->delete()) {
                session()->flash('app_message', 'Inbox successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Inbox');
            }

        return redirect()->back();
    }
}
