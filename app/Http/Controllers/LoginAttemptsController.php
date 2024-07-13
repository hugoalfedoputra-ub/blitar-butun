<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LoginAttempts;


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
        return LoginAttempts::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  LoginAttempts  $loginattempts
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $loginattempts = LoginAttempts::find($id);
        if ($loginattempts) {
            return response()->json($loginattempts);
        }
        return response()->json(['message' => 'LoginAttempts not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.login_attempts.create', [
            'model' => new LoginAttempts,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new LoginAttempts;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'LoginAttempts saved successfully');
            return redirect()->route('login_attempts.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving LoginAttempts');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  LoginAttempts  $loginattempts
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LoginAttempts $loginattempts)
    {

        return view('pages.login_attempts.edit', [
            'model' => $loginattempts,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  LoginAttempts  $loginattempts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,LoginAttempts $loginattempts)
    {
        $loginattempts->fill($request->all());

        if ($loginattempts->save()) {
            
            session()->flash('app_message', 'LoginAttempts successfully updated');
            return redirect()->route('login_attempts.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating LoginAttempts');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  LoginAttempts  $loginattempts
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, LoginAttempts $loginattempts)
    {
        if ($loginattempts->delete()) {
                session()->flash('app_message', 'LoginAttempts successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting LoginAttempts');
            }

        return redirect()->back();
    }
}
