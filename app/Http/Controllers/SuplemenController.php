<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suplemen;


/**
 * Description of SuplemenController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SuplemenController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.suplemen.index', ['records' => Suplemen::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Suplemen $suplemen)
    {
        return view('pages.suplemen.show', [
                'record' =>$suplemen,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.suplemen.create', [
            'model' => new Suplemen,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Suplemen;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Suplemen saved successfully');
            return redirect()->route('suplemen.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Suplemen');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Suplemen $suplemen)
    {

        return view('pages.suplemen.edit', [
            'model' => $suplemen,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Suplemen $suplemen)
    {
        $suplemen->fill($request->all());

        if ($suplemen->save()) {
            
            session()->flash('app_message', 'Suplemen successfully updated');
            return redirect()->route('suplemen.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Suplemen');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Suplemen  $suplemen
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Suplemen $suplemen)
    {
        if ($suplemen->delete()) {
                session()->flash('app_message', 'Suplemen successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Suplemen');
            }

        return redirect()->back();
    }
}
