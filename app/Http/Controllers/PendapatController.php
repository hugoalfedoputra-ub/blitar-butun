<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pendapat;


/**
 * Description of PendapatController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PendapatController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pendapat.index', ['records' => Pendapat::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  Pendapat  $pendapat
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pendapat $pendapat)
    {
        return view('pages.pendapat.show', [
                'record' =>$pendapat,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pendapat.create', [
            'model' => new Pendapat,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new Pendapat;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Pendapat saved successfully');
            return redirect()->route('pendapat.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Pendapat');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  Pendapat  $pendapat
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Pendapat $pendapat)
    {

        return view('pages.pendapat.edit', [
            'model' => $pendapat,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  Pendapat  $pendapat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Pendapat $pendapat)
    {
        $pendapat->fill($request->all());

        if ($pendapat->save()) {
            
            session()->flash('app_message', 'Pendapat successfully updated');
            return redirect()->route('pendapat.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Pendapat');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  Pendapat  $pendapat
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, Pendapat $pendapat)
    {
        if ($pendapat->delete()) {
                session()->flash('app_message', 'Pendapat successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Pendapat');
            }

        return redirect()->back();
    }
}
