<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IbuHamil;


/**
 * Description of IbuHamilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class IbuHamilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.ibu_hamil.index', ['records' => IbuHamil::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  IbuHamil  $ibuhamil
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, IbuHamil $ibuhamil)
    {
        return view('pages.ibu_hamil.show', [
                'record' =>$ibuhamil,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.ibu_hamil.create', [
            'model' => new IbuHamil,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new IbuHamil;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'IbuHamil saved successfully');
            return redirect()->route('ibu_hamil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving IbuHamil');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  IbuHamil  $ibuhamil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, IbuHamil $ibuhamil)
    {

        return view('pages.ibu_hamil.edit', [
            'model' => $ibuhamil,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  IbuHamil  $ibuhamil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,IbuHamil $ibuhamil)
    {
        $ibuhamil->fill($request->all());

        if ($ibuhamil->save()) {
            
            session()->flash('app_message', 'IbuHamil successfully updated');
            return redirect()->route('ibu_hamil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating IbuHamil');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  IbuHamil  $ibuhamil
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, IbuHamil $ibuhamil)
    {
        if ($ibuhamil->delete()) {
                session()->flash('app_message', 'IbuHamil successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting IbuHamil');
            }

        return redirect()->back();
    }
}
