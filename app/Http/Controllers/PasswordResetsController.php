<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PasswordResets;


/**
 * Description of PasswordResetsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PasswordResetsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.password_resets.index', ['records' => PasswordResets::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PasswordResets  $passwordresets
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PasswordResets $passwordresets)
    {
        return view('pages.password_resets.show', [
                'record' =>$passwordresets,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.password_resets.create', [
            'model' => new PasswordResets,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PasswordResets;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PasswordResets saved successfully');
            return redirect()->route('password_resets.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PasswordResets');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PasswordResets  $passwordresets
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PasswordResets $passwordresets)
    {

        return view('pages.password_resets.edit', [
            'model' => $passwordresets,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PasswordResets  $passwordresets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PasswordResets $passwordresets)
    {
        $passwordresets->fill($request->all());

        if ($passwordresets->save()) {
            
            session()->flash('app_message', 'PasswordResets successfully updated');
            return redirect()->route('password_resets.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PasswordResets');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PasswordResets  $passwordresets
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PasswordResets $passwordresets)
    {
        if ($passwordresets->delete()) {
                session()->flash('app_message', 'PasswordResets successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PasswordResets');
            }

        return redirect()->back();
    }
}
