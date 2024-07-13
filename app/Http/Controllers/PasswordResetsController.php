<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PasswordResetsModel;


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
        return view('pages.password_resets.index', ['records' => PasswordResetsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PasswordResetsModel  $passwordresetsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PasswordResetsModel $passwordresetsmodel)
    {
        return view('pages.password_resets.show', [
                'record' =>$passwordresetsmodel,
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
            'model' => new PasswordResetsModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PasswordResetsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PasswordResetsModel saved successfully');
            return redirect()->route('password_resets.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PasswordResetsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PasswordResetsModel  $passwordresetsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PasswordResetsModel $passwordresetsmodel)
    {

        return view('pages.password_resets.edit', [
            'model' => $passwordresetsmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PasswordResetsModel  $passwordresetsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PasswordResetsModel $passwordresetsmodel)
    {
        $passwordresetsmodel->fill($request->all());

        if ($passwordresetsmodel->save()) {
            
            session()->flash('app_message', 'PasswordResetsModel successfully updated');
            return redirect()->route('password_resets.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PasswordResetsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PasswordResetsModel  $passwordresetsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PasswordResetsModel $passwordresetsmodel)
    {
        if ($passwordresetsmodel->delete()) {
                session()->flash('app_message', 'PasswordResetsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PasswordResetsModel');
            }

        return redirect()->back();
    }
}
