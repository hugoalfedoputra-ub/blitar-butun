<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PelapakModel;


/**
 * Description of PelapakController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class PelapakController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.pelapak.index', ['records' => PelapakModel::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  PelapakModel  $pelapakmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PelapakModel $pelapakmodel)
    {
        return view('pages.pelapak.show', [
                'record' =>$pelapakmodel,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.pelapak.create', [
            'model' => new PelapakModel,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model=new PelapakModel;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'PelapakModel saved successfully');
            return redirect()->route('pelapak.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving PelapakModel');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  PelapakModel  $pelapakmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PelapakModel $pelapakmodel)
    {

        return view('pages.pelapak.edit', [
            'model' => $pelapakmodel,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Request  $request
     * @param  PelapakModel  $pelapakmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PelapakModel $pelapakmodel)
    {
        $pelapakmodel->fill($request->all());

        if ($pelapakmodel->save()) {
            
            session()->flash('app_message', 'PelapakModel successfully updated');
            return redirect()->route('pelapak.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating PelapakModel');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Request  $request
     * @param  PelapakModel  $pelapakmodel
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Request $request, PelapakModel $pelapakmodel)
    {
        if ($pelapakmodel->delete()) {
                session()->flash('app_message', 'PelapakModel successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting PelapakModel');
            }

        return redirect()->back();
    }
}
