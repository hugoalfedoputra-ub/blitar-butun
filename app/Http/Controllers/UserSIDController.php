<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserSID;


/**
 * Description of UserSIDController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class UserSIDController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return UserSID::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  UserSID  $usersid
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserSID $usersid)
    {
        return view('pages.user.show', [
                'record' =>$usersid,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.user.create', [
            'model' => new UserSID,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new UserSID;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'UserSID saved successfully');
            return redirect()->route('user.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving UserSID');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  UserSID  $usersid
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserSID $usersid)
    {

        return view('pages.user.edit', [
            'model' => $usersid,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  UserSID  $usersid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserSID $usersid)
    {
        $usersid->fill($request->all());

        if ($usersid->save()) {
            
            session()->flash('app_message', 'UserSID successfully updated');
            return redirect()->route('user.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating UserSID');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  UserSID  $usersid
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, UserSID $usersid)
    {
        if ($usersid->delete()) {
                session()->flash('app_message', 'UserSID successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting UserSID');
            }

        return redirect()->back();
    }
}
