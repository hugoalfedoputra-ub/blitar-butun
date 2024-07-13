<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserGrup;


/**
 * Description of UserGrupController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class UserGrupController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return UserGrup::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  UserGrup  $usergrup
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $usergrup = UserGrup::find($id);
        if ($usergrup) {
            return response()->json($usergrup);
        }
        return response()->json(['message' => 'UserGrup not found'], 404);
    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.user_grup.create', [
            'model' => new UserGrup,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new UserGrup;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'UserGrup saved successfully');
            return redirect()->route('user_grup.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving UserGrup');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  UserGrup  $usergrup
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserGrup $usergrup)
    {

        return view('pages.user_grup.edit', [
            'model' => $usergrup,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  UserGrup  $usergrup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserGrup $usergrup)
    {
        $usergrup->fill($request->all());

        if ($usergrup->save()) {
            
            session()->flash('app_message', 'UserGrup successfully updated');
            return redirect()->route('user_grup.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating UserGrup');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  UserGrup  $usergrup
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, UserGrup $usergrup)
    {
        if ($usergrup->delete()) {
                session()->flash('app_message', 'UserGrup successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting UserGrup');
            }

        return redirect()->back();
    }
}
