<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Persil;


/**
 * Description of PersilController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PersilController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Persil::paginate(10);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Persil  $persil
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Persil $persil)
    {
        return view('pages.persil.show', [
                'record' =>$persil,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.persil.create', [
            'model' => new Persil,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Persil;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Persil saved successfully');
            return redirect()->route('persil.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Persil');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Persil  $persil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Persil $persil)
    {

        return view('pages.persil.edit', [
            'model' => $persil,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Persil  $persil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Persil $persil)
    {
        $persil->fill($request->all());

        if ($persil->save()) {
            
            session()->flash('app_message', 'Persil successfully updated');
            return redirect()->route('persil.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Persil');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Persil  $persil
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Persil $persil)
    {
        if ($persil->delete()) {
                session()->flash('app_message', 'Persil successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Persil');
            }

        return redirect()->back();
    }
}
