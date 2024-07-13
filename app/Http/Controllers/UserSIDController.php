<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserSIDModel;


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
        return view('pages.user.index', ['records' => UserSIDModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  UserSIDModel  $usersidmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserSIDModel $usersidmodel)
    {
        return view('pages.user.show', [
                'record' =>$usersidmodel,
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
            'model' => new UserSIDModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new UserSIDModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'UserSIDModel saved successfully');
            return redirect()->route('user.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving UserSIDModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  UserSIDModel  $usersidmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserSIDModel $usersidmodel)
    {

        return view('pages.user.edit', [
            'model' => $usersidmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  UserSIDModel  $usersidmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserSIDModel $usersidmodel)
    {
        $usersidmodel->fill($request->all());

        if ($usersidmodel->save()) {
            
            session()->flash('app_message', 'UserSIDModel successfully updated');
            return redirect()->route('user.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating UserSIDModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  UserSIDModel  $usersidmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, UserSIDModel $usersidmodel)
    {
        if ($usersidmodel->delete()) {
                session()->flash('app_message', 'UserSIDModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting UserSIDModel');
            }

        return redirect()->back();
    }
}
