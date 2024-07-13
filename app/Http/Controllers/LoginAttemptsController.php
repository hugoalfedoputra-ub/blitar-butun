<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoginAttemptsModel;


/**
 * Description of LoginAttemptsController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class LoginAttemptsController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.login_attempts.index', ['records' => LoginAttemptsModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LoginAttemptsModel  $loginattemptsmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LoginAttemptsModel $loginattemptsmodel)
    {
        return view('pages.login_attempts.show', [
                'record' =>$loginattemptsmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.login_attempts.create', [
            'model' => new LoginAttemptsModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LoginAttemptsModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LoginAttemptsModel saved successfully');
            return redirect()->route('login_attempts.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LoginAttemptsModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LoginAttemptsModel  $loginattemptsmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LoginAttemptsModel $loginattemptsmodel)
    {

        return view('pages.login_attempts.edit', [
            'model' => $loginattemptsmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LoginAttemptsModel  $loginattemptsmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LoginAttemptsModel $loginattemptsmodel)
    {
        $loginattemptsmodel->fill($request->all());

        if ($loginattemptsmodel->save()) {
            
            session()->flash('app_message', 'LoginAttemptsModel successfully updated');
            return redirect()->route('login_attempts.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LoginAttemptsModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LoginAttemptsModel  $loginattemptsmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LoginAttemptsModel $loginattemptsmodel)
    {
        if ($loginattemptsmodel->delete()) {
                session()->flash('app_message', 'LoginAttemptsModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LoginAttemptsModel');
            }

        return redirect()->back();
    }
}
